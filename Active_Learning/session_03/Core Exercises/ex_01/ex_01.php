<?php
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Trim dữ liệu
$name = trim($name);
$email = trim($email);
$message = trim($message);

// Kiểm tra thiếu dữ liệu
if ($name == '' || $email == '' || $message == '') {
    echo "<h2>❌ Lỗi</h2>";
    echo "<p>Vui lòng nhập đầy đủ thông tin!</p>";
    echo "<a href='ex_01.html'>Quay lại</a>";
    exit;
}

// Nếu hợp lệ
echo "<h2>✅ Gửi thành công!</h2>";
echo "<p><strong>Tên:</strong> $name</p>";
echo "<p><strong>Email:</strong> $email</p>";
echo "<p><strong>Nội dung:</strong> $message</p>";
echo "<a href='ex_01.html'>Gửi thêm</a>";
?>
