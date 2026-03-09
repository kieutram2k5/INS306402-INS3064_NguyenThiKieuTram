<?php
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$age = $_POST['age'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<title>Finish</title>

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

.result{
    background:#f2f2f2;
    padding:10px;
    border-radius:5px;
    margin-top:10px;
}
</style>

</head>
<body>

<div class="card">

<h2>Finish</h2>

<div class="result">
<p>Name: <?php echo htmlspecialchars($name); ?></p>
<p>Email: <?php echo htmlspecialchars($email); ?></p>
<p>Age: <?php echo htmlspecialchars($age); ?></p>
</div>

</div>

</body>
</html>