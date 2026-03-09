<?php

$method = $_GET['method'] ?? 'GET';
$data = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $method = 'POST';
    $data = $_POST;
}
elseif($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['name'])){
    $method = 'GET';
    $data = $_GET;
}

?>

<!DOCTYPE html>
<html>
<head>
<title>GET vs POST Toggle</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#36d1dc,#5b86e5);
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
width:420px;
box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

h2{
text-align:center;
margin-bottom:20px;
}

select,input{
width:100%;
padding:10px;
margin-bottom:15px;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:12px;
background:#36d1dc;
border:none;
color:white;
font-size:16px;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#2bb9c3;
}

.result{
margin-top:20px;
background:#f4f6fb;
padding:15px;
border-radius:8px;
font-family:monospace;
font-size:14px;
}

.method{
font-weight:bold;
margin-bottom:10px;
}

</style>

<script>

function changeMethod(){
    let method = document.getElementById("method").value;
    document.getElementById("form").method = method;
}

</script>

</head>

<body>

<div class="card">

<h2>GET vs POST Toggle</h2>

<form id="form" method="GET">

<select id="method" onchange="changeMethod()">
<option value="GET">GET Method</option>
<option value="POST">POST Method</option>
</select>

<input type="text" name="name" placeholder="Enter name" required>

<input type="email" name="email" placeholder="Enter email" required>

<button type="submit">Submit</button>

</form>

<?php if(!empty($data)): ?>

<div class="result">

<div class="method">
Detected Method: <?php echo $_SERVER['REQUEST_METHOD']; ?>
</div>

<pre>
<?php
print_r($data);
?>
</pre>

</div>

<?php endif; ?>

</div>

</body>
</html>