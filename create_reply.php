<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    // 检查用户是否登录
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => '请先登录']);
        exit;
    }

    // 获取表单数据和帖子ID
    $content = $_POST['content'];
    $postId = $_POST['post_id']; // 确保你的表单中有隐藏的post_id字段

    // TODO: 数据库连接和插入回复逻辑

    echo json_encode(['status' => 'success', 'message' => '回复成功！']);
}
?>