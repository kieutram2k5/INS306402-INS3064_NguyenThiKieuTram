<?php
session_start();

// Tài khoản mẫu
$correctUser = "admin";
$correctPass = "123456";

// Khởi tạo số lần sai
if (!isset($_SESSION['fail_count'])) {
    $_SESSION['fail_count'] = 0;
}

$message = "";
$locked = false;

// Nếu sai quá 3 lần thì khóa
if ($_SESSION['fail_count'] >= 3) {
    $locked = true;
    $message = "❌ Bạn đã đăng nhập sai quá 3 lần. Tài khoản tạm bị khóa!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !$locked) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === "" || $password === "") {
        $message = "⚠️ Vui lòng nhập đầy đủ username và password!";
    } else if ($username === $correctUser && $password === $correctPass) {
        $_SESSION['fail_count'] = 0; // reset khi đúng
        $message = "✅ Đăng nhập thành công! Chào mừng bạn, <b>$username</b>!";
    } else {
        $_SESSION['fail_count']++;
        $remaining = 3 - $_SESSION['fail_count'];

        if ($remaining > 0) {
            $message = "❌ Sai tài khoản hoặc mật khẩu! Còn $remaining lần thử.";
        } else {
            $message = "❌ Bạn đã đăng nhập sai quá 3 lần. Tài khoản tạm bị khóa!";
            $locked = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả đăng nhập</title>
</head>
<body style="font-family: Arial; text-align:center; margin-top:50px;">

    <h2>Kết quả</h2>

    <p><?php echo $message; ?></p>

    <p>Số lần đăng nhập sai: <?php echo $_SESSION['fail_count']; ?>/3</p>

    <?php if (!$locked): ?>
        <a href="ex_03.html">⬅ Quay lại trang đăng nhập</a>
    <?php else: ?>
        <p style="color:red;">Form đã bị khóa do đăng nhập sai quá nhiều lần.</p>
    <?php endif; ?>

</body>
</html>
