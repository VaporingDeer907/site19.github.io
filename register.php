<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: 密码加密，例如使用password_hash
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    // TODO: 数据库连接，使用PDO或mysqli
    $pdo = new PDO('mysql:host=your_host;dbname=your_db', 'username', 'password');

    // 插入数据库
    $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    $stmt->execute([':username' => $username, ':password' => $passwordHashed]);

    // 重定向到登录页面或其他页面
    header('Location: login.php');
    exit;

    echo json_encode(['status' => 'success', 'message' => '注册成功！']);
}
?>