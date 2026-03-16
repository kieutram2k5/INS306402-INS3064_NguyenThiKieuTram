<?php
session_start();

if(!isset($_SESSION["user"])){
header("Location: login.php");
exit;
}

$users=json_decode(file_get_contents("data/users.json"),true);

$current=$_SESSION["user"];

foreach($users as &$user){

if($user["username"]==$current){

if($_SERVER["REQUEST_METHOD"]=="POST"){

$user["bio"]=$_POST["bio"];

if(isset($_FILES["avatar"])){

$file=$_FILES["avatar"];

$ext=strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));

$allowed=["jpg","png","jpeg","gif"];

if(in_array($ext,$allowed)){

$path="uploads/".$file["name"];

move_uploaded_file($file["tmp_name"],$path);

$user["avatar"]=$path;

}

}

file_put_contents("data/users.json",json_encode($users));

}

$bio=$user["bio"];
$avatar=$user["avatar"];

}

}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

<h2>Edit Profile</h2>

<form method="POST" enctype="multipart/form-data">

<textarea name="bio"><?php echo htmlspecialchars($bio); ?></textarea>

<input type="file" name="avatar">

<button>Update</button>

</form>

<?php
if($avatar){
echo "<img class='avatar' src='$avatar'>";
}
?>

</div>