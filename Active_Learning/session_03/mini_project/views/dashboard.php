<?php
session_start();

if(!isset($_SESSION["user"])){
header("Location: login.php");
exit;
}

$users=json_decode(file_get_contents("data/users.json"),true);

$current=$_SESSION["user"];

foreach($users as $user){

if($user["username"]==$current){

$bio=$user["bio"];
$avatar=$user["avatar"];

}

}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

<h2>Dashboard</h2>

<p>Welcome <?php echo $current; ?></p>

<p><?php echo htmlspecialchars($bio); ?></p>

<?php
if($avatar){
echo "<img class='avatar' src='$avatar'>";
}
?>

<br><br>

<a href="profile.php">Edit Profile</a>

<br><br>

<a href="logout.php">Logout</a>

</div>