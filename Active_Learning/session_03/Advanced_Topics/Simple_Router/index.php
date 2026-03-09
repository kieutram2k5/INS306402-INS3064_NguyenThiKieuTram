<?php

$page = $_GET['page'] ?? 'home';

/* allowed routes */
$routes = [
    "home" => "views/home.php",
    "about" => "views/about.php",
    "contact" => "views/contact.php"
];

?>

<!DOCTYPE html>
<html>
<head>
<title>Simple Router</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#667eea,#764ba2);
margin:0;
color:#333;
}

.navbar{
background:#333;
padding:15px;
text-align:center;
}

.navbar a{
color:white;
margin:0 15px;
text-decoration:none;
font-weight:bold;
}

.navbar a:hover{
text-decoration:underline;
}

.container{
max-width:800px;
margin:40px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h1{
margin-top:0;
}

</style>

</head>

<body>

<div class="navbar">

<a href="?page=home">Home</a>
<a href="?page=about">About</a>
<a href="?page=contact">Contact</a>

</div>

<div class="container">

<?php

if(array_key_exists($page,$routes)){
    include $routes[$page];
}
else{
    echo "<h1>404 - Page Not Found</h1>";
    echo "<p>The page you requested does not exist.</p>";
}

?>

</div>

</body>
</html>