<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 开始会话
    session_start();

    // 检查用户是否登录
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => '请先登录']);
        exit;
    }

    // 获取表单数据
    $title = $_POST['title'];
    $content = $_POST['content'];

    // TODO: 数据库连接和插入逻辑

    echo json_encode(['status' => 'success', 'message' => '帖子创建成功！']);
}
?>