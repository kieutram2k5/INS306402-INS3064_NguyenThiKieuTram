<?php

$users=json_decode(file_get_contents("data/users.json"),true);

if(!isset($_SESSION["fail"])) $_SESSION["fail"]=0;

if($_SESSION["fail"]>=3){
echo "Too many login attempts";
exit;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

$username=$_POST["username"];
$password=$_POST["password"];

foreach($users as $user){

if($user["username"]==$username && $user["password"]==$password){

$_SESSION["user"]=$username;

header("Location:index.php?page=dashboard");
exit;

}

}

$_SESSION["fail"]++;

$error="Login failed";

}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

<h2>Login</h2>

<?php if(isset($error)) echo $error; ?>

<form method="POST">

<input name="username" placeholder="Username">

<input type="password" name="password" placeholder="Password">

<button>Login</button>

</form>

<div class="link">
<a href="index.php?page=register">Register</a>
</div>

</div>