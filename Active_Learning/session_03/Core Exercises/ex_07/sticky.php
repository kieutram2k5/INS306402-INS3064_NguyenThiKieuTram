<?php

$name = "";
$email = "";
$message = "";

$nameErr = "";
$emailErr = "";
$messageErr = "";

$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $valid = true;

    if (empty($name)) {
        $nameErr = "Name is required";
        $valid = false;
    }

    if (empty($email)) {
        $emailErr = "Email is required";
        $valid = false;
    }

    if (empty($message)) {
        $messageErr = "Message is required";
        $valid = false;
    }

    if ($valid) {
        $success = "Form submitted successfully!";
        $name = "";
        $email = "";
        $message = "";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sticky Form</title>

<style>

body{
    font-family: Arial;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#5f7cff,#7b4bb7);
}

.form-box{
    background:white;
    padding:30px;
    width:400px;
    border-radius:10px;
}

h2{
    text-align:center;
}

input, textarea{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    width:100%;
    padding:12px;
    background:#6c7ae0;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

.error{
    color:red;
    font-size:14px;
}

.success{
    background:#c9f0d1;
    padding:10px;
    margin-bottom:15px;
    border-radius:5px;
    text-align:center;
}

</style>
</head>

<body>

<div class="form-box">

<h2>Contact Form</h2>

<?php if($success): ?>
<div class="success"><?php echo $success; ?></div>
<?php endif; ?>

<form method="POST">

<label>Name</label>
<input type="text" name="name" value="<?php echo $name; ?>">
<div class="error"><?php echo $nameErr; ?></div>

<label>Email</label>
<input type="email" name="email" value="<?php echo $email; ?>">
<div class="error"><?php echo $emailErr; ?></div>

<label>Message</label>
<textarea name="message"><?php echo $message; ?></textarea>
<div class="error"><?php echo $messageErr; ?></div>

<button type="submit">Send Message</button>

</form>

</div>

</body>
</html>