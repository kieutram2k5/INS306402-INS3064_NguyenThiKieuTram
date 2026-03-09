<?php

$query = $_GET["q"] ?? "";

$safeQuery = htmlspecialchars($query, ENT_QUOTES, "UTF-8");

?>

<!DOCTYPE html>
<html>
<head>

<title>Search Page</title>

<style>

body{
    font-family: Arial;
    background:#f4f6f9;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    background:white;
    padding:30px;
    border-radius:10px;
    width:400px;
    box-shadow:0 8px 20px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border-radius:6px;
    border:1px solid #ccc;
}

button{
    width:100%;
    padding:10px;
    background:#3498db;
    border:none;
    color:white;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#2980b9;
}

.result{
    margin-top:15px;
    padding:10px;
    background:#ecf0f1;
    border-radius:6px;
}

</style>

</head>

<body>

<div class="container">

<h2>Search</h2>

<form method="GET">

<input
type="text"
name="q"
placeholder="Enter keyword..."
value="<?= $safeQuery ?>"
>

<button type="submit">Search</button>

</form>

<?php if($query): ?>

<div class="result">

You searched for:
<strong><?= $safeQuery ?></strong>

</div>

<?php endif; ?>

</div>

</body>
</html>