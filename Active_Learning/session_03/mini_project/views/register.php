<?php
session_start();

if(!file_exists("data/users.json")){
file_put_contents("data/users.json","[]");
}

$users=json_decode(file_get_contents("data/users.json"),true);

if($_SERVER["REQUEST_METHOD"]=="POST"){

$username=$_POST["username"];
$password=$_POST["password"];
$confirm=$_POST["confirm"];
$bio=$_POST["bio"];

if($password!=$confirm){
$error="Passwords do not match";
}else{

$users[]=[
"username"=>$username,
"password"=>$password,
"bio"=>$bio,
"avatar"=>""
];

file_put_contents("data/users.json",json_encode($users));

header("Location: login.php");
exit;
}

}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

<h2>Register</h2>

<?php if(isset($error)) echo $error; ?>

<form method="POST">

<input name="username" placeholder="Username">

<input type="password" name="password" placeholder="Password">

<input type="password" name="confirm" placeholder="Confirm Password">

<textarea name="bio" placeholder="Bio"></textarea>

<button>Register</button>

</form>

<div class="link">
<a href="login.php">Login</a>
</div>

</div>