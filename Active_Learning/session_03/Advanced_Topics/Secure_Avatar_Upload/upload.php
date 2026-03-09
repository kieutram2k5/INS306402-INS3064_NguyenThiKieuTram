<?php

$message = "";
$uploaded_file = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_FILES["avatar"])){

        $file = $_FILES["avatar"];

        $allowed_types = ["image/jpeg","image/png"];
        $max_size = 2 * 1024 * 1024; // 2MB

        if($file["error"] !== 0){
            $message = "❌ Upload error.";
        }
        elseif($file["size"] > $max_size){
            $message = "❌ File must be less than 2MB.";
        }
        else{

            // check real MIME type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo,$file["tmp_name"]);
            finfo_close($finfo);

            if(!in_array($mime,$allowed_types)){
                $message = "❌ Only JPG and PNG allowed.";
            }
            else{

                // create uploads folder if not exists
                $upload_dir = __DIR__ . "/uploads/";

                if(!is_dir($upload_dir)){
                    mkdir($upload_dir,0777,true);
                }

                // rename file
                $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
                $new_name = uniqid("avatar_",true).".".$ext;

                $upload_path = $upload_dir . $new_name;

                if(move_uploaded_file($file["tmp_name"], $upload_path)){
                    $message = "✅ Upload successful!";
                    $uploaded_file = "uploads/".$new_name;
                }else{
                    $message = "❌ Failed to move uploaded file.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Secure Avatar Upload</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#667eea,#764ba2);
height:100vh;
display:flex;
align-items:center;
justify-content:center;
margin:0;
}

.card{
background:white;
padding:40px;
border-radius:12px;
width:420px;
text-align:center;
box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

h2{
margin-bottom:20px;
}

.upload-box{
border:2px dashed #ccc;
padding:30px;
border-radius:10px;
margin-bottom:20px;
transition:0.3s;
}

.upload-box:hover{
border-color:#667eea;
background:#f7f8ff;
}

input[type=file]{
margin-top:10px;
}

button{
background:#667eea;
color:white;
border:none;
padding:12px 20px;
border-radius:6px;
font-size:16px;
cursor:pointer;
width:100%;
}

button:hover{
background:#5a67d8;
}

.message{
margin-top:15px;
font-weight:bold;
}

.avatar-preview{
margin-top:20px;
}

.avatar-preview img{
width:120px;
height:120px;
border-radius:50%;
object-fit:cover;
border:3px solid #667eea;
}

.small{
font-size:12px;
color:#666;
}

</style>

</head>

<body>

<div class="card">

<h2>Secure Avatar Upload</h2>

<form method="post" enctype="multipart/form-data">

<div class="upload-box">

📷 Choose your avatar

<br><br>

<input type="file" name="avatar" required>

<p class="small">Allowed: JPG, PNG • Max size: 2MB</p>

</div>

<button type="submit">Upload Avatar</button>

</form>

<?php if($message): ?>
<div class="message"><?php echo $message; ?></div>
<?php endif; ?>

<?php if($uploaded_file): ?>
<div class="avatar-preview">
<p>Your Avatar</p>
<img src="<?php echo $uploaded_file; ?>">
</div>
<?php endif; ?>

</div>

</body>
</html>