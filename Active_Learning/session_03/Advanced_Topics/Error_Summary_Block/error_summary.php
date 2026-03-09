<?php

$errors = [];
$name = "";
$email = "";
$password = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if($name === ""){
        $errors["name"] = "Name is required.";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors["email"] = "Valid email is required.";
    }

    if(strlen($password) < 6){
        $errors["password"] = "Password must be at least 6 characters.";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Error Summary Validation</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#ff9a9e,#fad0c4);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
margin:0;
}

.card{
background:white;
padding:35px;
border-radius:12px;
width:420px;
box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

h2{
text-align:center;
margin-bottom:20px;
}

input{
width:100%;
padding:10px;
margin-bottom:12px;
border:1px solid #ccc;
border-radius:5px;
}

input.error{
border-color:red;
background:#ffecec;
}

button{
width:100%;
padding:12px;
border:none;
background:#ff6b6b;
color:white;
font-size:16px;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#ff5252;
}

.error-summary{
background:#ffecec;
border:1px solid red;
padding:15px;
border-radius:8px;
margin-bottom:15px;
}

.error-summary ul{
margin:0;
padding-left:18px;
}

.success{
color:green;
margin-top:10px;
font-weight:bold;
}

</style>

</head>

<body>

<div class="card">

<h2>Registration Form</h2>

<?php if(!empty($errors)): ?>

<div class="error-summary">

<strong>Please fix the following errors:</strong>

<ul>
<?php
foreach($errors as $error){
    echo "<li>$error</li>";
}
?>
</ul>

</div>

<?php endif; ?>

<form method="POST">

<input 
type="text"
name="name"
placeholder="Name"
value="<?php echo htmlspecialchars($name); ?>"
class="<?php echo isset($errors['name']) ? 'error' : ''; ?>"
>

<input
type="email"
name="email"
placeholder="Email"
value="<?php echo htmlspecialchars($email); ?>"
class="<?php echo isset($errors['email']) ? 'error' : ''; ?>"
>

<input
type="password"
name="password"
placeholder="Password"
class="<?php echo isset($errors['password']) ? 'error' : ''; ?>"
>

<button type="submit">Register</button>

</form>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST" && empty($errors)){
    echo "<div class='success'>Registration successful!</div>";
}
?>

</div>

</body>
</html>