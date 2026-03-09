<?php

$name = "";
$email = "";
$message = "";
$success = "";
$error = "";

/* Request Detection */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $email === "" || $message === "") {
        $error = "Please fill in all fields.";
    } else {

        /* Post → Redirect → Get */
        header("Location: contact_self.php?success=1");
        exit();
    }
}

/* Display success message */
if (isset($_GET["success"])) {
    $success = "Your message has been submitted successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Contact Form</title>

<style>

body{
    font-family: Arial;
    background: linear-gradient(135deg,#667eea,#764ba2);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    background:white;
    padding:30px;
    width:380px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

input, textarea{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:6px;
    border:1px solid #ccc;
}

button{
    width:100%;
    padding:12px;
    border:none;
    background:#667eea;
    color:white;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#5563c1;
}

.msg{
    margin-bottom:10px;
    padding:10px;
    border-radius:6px;
    text-align:center;
}

.success{
    background:#e8f5e9;
    color:#2e7d32;
}

.error{
    background:#ffebee;
    color:#c62828;
}

</style>

</head>

<body>

<div class="card">

<h2>Contact Us</h2>

<?php if ($success): ?>
<div class="msg success"><?= $success ?></div>
<?php endif; ?>

<?php if ($error): ?>
<div class="msg error"><?= $error ?></div>
<?php endif; ?>

<form method="POST">

<input 
type="text" 
name="name" 
placeholder="Your Name"
value="<?= htmlspecialchars($name) ?>"
>

<input 
type="email" 
name="email" 
placeholder="Your Email"
value="<?= htmlspecialchars($email) ?>"
>

<textarea 
name="message" 
placeholder="Your Message"
rows="4"
><?= htmlspecialchars($message) ?></textarea>

<button type="submit">Send Message</button>

</form>

</div>

</body>
</html>