<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: 验证用户名和密码
    // $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    // $stmt->execute([':username' => $username]);
    // $user = $stmt->fetch();

    // if ($user && password_verify($password, $user['password'])) {
        // TODO: 处理登录成功逻辑，例如设置session
        // session_start();
        // $_SESSION['user_id'] = $user['id'];

        echo json_encode(['status' => 'success', 'message' => '登录成功！']);
    // } else {
    //     echo json_encode(['status' => 'error', 'message' => '用户名或密码错误']);
    // }
}
?>