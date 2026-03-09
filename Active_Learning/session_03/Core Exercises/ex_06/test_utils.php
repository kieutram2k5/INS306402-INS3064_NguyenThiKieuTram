<?php
require_once __DIR__ . "/utils.php";

$result = "";
$success = false;

$name = "";
$email = "";
$age = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = sanitizeString($_POST["name"] ?? "");
    $email = sanitizeEmail($_POST["email"] ?? "");
    $age = sanitizeNumber($_POST["age"] ?? "");

    if (!checkRequired($name)) {
        $result = "Name is required";
    }
    elseif (!checkMinLength($name,3)) {
        $result = "Name must be at least 3 characters";
    }
    elseif (!checkEmail($email)) {
        $result = "Invalid email format";
    }
    elseif (!checkNumber($age)) {
        $result = "Age must be a number";
    }
    elseif (!checkRange($age,18,60)) {
        $result = "Age must be between 18 and 60";
    }
    else {
        $success = true;
        $result = "All validations passed successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Validation Library Test</title>

<style>

body{
    font-family: Arial;
    background: linear-gradient(135deg,#667eea,#764ba2);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    background:white;
    padding:40px;
    border-radius:12px;
    width:380px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

input{
    width:100%;
    padding:10px;
    margin-top:8px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:6px;
}

button{
    width:100%;
    padding:12px;
    border:none;
    background:#667eea;
    color:white;
    font-size:16px;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#5563d1;
}

.result{
    margin-top:15px;
    padding:10px;
    border-radius:6px;
    text-align:center;
}

.success{
    background:#d4edda;
    color:#155724;
}

.error{
    background:#f8d7da;
    color:#721c24;
}

</style>
</head>

<body>

<div class="container">

<h2>Validation Library Test</h2>

<form method="POST">

<label>Name</label>
<input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter your name">

<label>Email</label>
<input type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter your email">

<label>Age</label>
<input type="text" name="age" value="<?php echo $age; ?>" placeholder="Enter your age">

<button type="submit">Validate</button>

</form>

<?php
if($result != ""){
    if($success){
        echo "<div class='result success'>$result</div>";
    }else{
        echo "<div class='result error'>$result</div>";
    }
}
?>

</div>

</body>
</html>