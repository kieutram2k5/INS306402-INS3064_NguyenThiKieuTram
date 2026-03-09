<?php
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<title>Step 2</title>

<style>
body{
    font-family: Arial;
    background:#f4f6fb;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.card{
    background:white;
    padding:30px;
    border-radius:10px;
    width:350px;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
}

h2{text-align:center;}

p{
    background:#f2f2f2;
    padding:8px;
    border-radius:5px;
}

input{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
}

button{
    width:100%;
    padding:10px;
    background:#4CAF50;
    color:white;
    border:none;
    border-radius:5px;
}
</style>

</head>
<body>

<div class="card">

<h2>Step 2</h2>

<p>Name: <?php echo htmlspecialchars($name); ?></p>
<p>Email: <?php echo htmlspecialchars($email); ?></p>

<form action="finish.php" method="post">

<input type="hidden" name="name" value="<?php echo $name; ?>">
<input type="hidden" name="email" value="<?php echo $email; ?>">

<label>Age</label>
<input type="number" name="age" required>

<button type="submit">Finish</button>

</form>

</div>

</body>
</html>