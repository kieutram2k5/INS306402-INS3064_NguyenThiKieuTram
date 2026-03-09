<?php
$result = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num1 = $_POST["num1"] ?? "";
    $num2 = $_POST["num2"] ?? "";
    $operation = $_POST["operation"] ?? "";

    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Please enter valid numbers.";
    } else {

        $num1 = (float)$num1;
        $num2 = (float)$num2;

        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                break;

            case "sub":
                $result = $num1 - $num2;
                break;

            case "mul":
                $result = $num1 * $num2;
                break;

            case "div":
                if ($num2 == 0) {
                    $error = "Cannot divide by zero.";
                } else {
                    $result = $num1 / $num2;
                }
                break;

            default:
                $error = "Invalid operation.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Arithmetic Calculator</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,#6a11cb,#2575fc);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    background:white;
    padding:30px;
    border-radius:12px;
    width:350px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

input, select{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:6px;
    border:1px solid #ccc;
}

button{
    width:100%;
    padding:12px;
    margin-top:10px;
    background:#2575fc;
    border:none;
    color:white;
    font-size:16px;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#1b5edb;
}

.result{
    margin-top:15px;
    padding:10px;
    border-radius:6px;
    text-align:center;
    font-weight:bold;
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

<h2>Arithmetic Calculator</h2>

<form method="POST">

<input 
type="text" 
name="num1" 
placeholder="First number"
value="<?= htmlspecialchars($_POST['num1'] ?? '') ?>"
>

<select name="operation">

<option value="add">Addition (+)</option>
<option value="sub">Subtraction (-)</option>
<option value="mul">Multiplication (*)</option>
<option value="div">Division (/)</option>

</select>

<input 
type="text" 
name="num2" 
placeholder="Second number"
value="<?= htmlspecialchars($_POST['num2'] ?? '') ?>"
>

<button type="submit">Calculate</button>

</form>

<?php if ($result !== ""): ?>

<div class="result success">
Result: <?= $result ?>
</div>

<?php endif; ?>

<?php if ($error !== ""): ?>

<div class="result error">
<?= $error ?>
</div>

<?php endif; ?>

</div>

</body>
</html>