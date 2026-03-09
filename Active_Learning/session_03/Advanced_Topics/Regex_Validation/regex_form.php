<?php

$password = "";
$errors = [];
$success = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $password = $_POST["password"];

    if(!preg_match('/[A-Z]/', $password)){
        $errors[] = "Password must contain at least 1 uppercase letter.";
    }

    if(!preg_match('/[a-z]/', $password)){
        $errors[] = "Password must contain at least 1 lowercase letter.";
    }

    if(!preg_match('/[0-9]/', $password)){
        $errors[] = "Password must contain at least 1 number.";
    }

    if(!preg_match('/[\W_]/', $password)){
        $errors[] = "Password must contain at least 1 symbol.";
    }

    if(empty($errors)){
        $success = "Strong password accepted!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Regex Password Validation</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#ff7e5f,#feb47b);
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
background:#ff7e5f;
color:white;
font-size:16px;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#ff6846;
}

.error{
color:red;
margin-bottom:10px;
}

.success{
color:green;
font-weight:bold;
margin-top:10px;
}

.rules{
font-size:13px;
color:#555;
margin-bottom:15px;
}

</style>

</head>

<body>

<div class="card">

<h2>Password Validation</h2>

<div class="rules">
Password must include:
<ul>
<li>1 uppercase letter</li>
<li>1 lowercase letter</li>
<li>1 number</li>
<li>1 symbol</li>
</ul>
</div>

<form method="POST">

<input type="password" name="password" placeholder="Enter password" required>

<button type="submit">Validate Password</button>

</form>

<?php
if(!empty($errors)){
    foreach($errors as $error){
        echo "<div class='error'>$error</div>";
    }
}

if($success){
    echo "<div class='success'>$success</div>";
}
?>

</div>

</body>
</html>