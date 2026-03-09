<?php
session_start();

/* Generate CSRF token */
if(!isset($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

/* Set cookie (Double Submit Cookie) */
setcookie("csrf_token", $_SESSION['csrf_token'], time()+3600, "/");

$error = "";
$success = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $post_token = $_POST["csrf_token"] ?? "";
    $cookie_token = $_COOKIE["csrf_token"] ?? "";

    /* Verify token */
    if(!$post_token || !$cookie_token || $post_token !== $cookie_token){
        http_response_code(403);
        die("403 Forbidden - CSRF token invalid");
    }

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);

    $success = "Form submitted securely!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>CSRF Protection Form</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#4facfe,#00f2fe);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
margin:0;
}

.card{
background:white;
padding:40px;
border-radius:12px;
width:380px;
box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

h2{
text-align:center;
margin-bottom:20px;
}

input{
width:100%;
padding:10px;
margin-bottom:15px;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:12px;
border:none;
background:#4facfe;
color:white;
font-size:16px;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#3a8ee6;
}

.success{
margin-top:15px;
color:green;
font-weight:bold;
}

</style>

</head>

<body>

<div class="card">

<h2>Secure Form (CSRF Protected)</h2>

<form method="POST">

<input type="text" name="name" placeholder="Your Name" required>

<input type="email" name="email" placeholder="Your Email" required>

<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

<button type="submit">Submit</button>

</form>

<?php if($success): ?>
<div class="success"><?php echo $success; ?></div>
<?php endif; ?>

</div>

</body>
</html>