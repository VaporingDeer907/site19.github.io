<?php
// 连接数据库，这里需要替换为你的数据库信息
$host = 'localhost'; // 数据库服务器
$dbname = 'your_database_name'; // 数据库名
$username = 'your_username'; // 数据库用户名
$password = 'your_password'; // 数据库密码

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // 设置 PDO 错误模式为异常
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("连接失败: " . $e->getMessage());
}

// 检查是否提交了表单
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $content = $_POST['content']; // 回复内容
    $post_id = $_POST['post_id']; // 帖子ID，假设这个值是通过某种方式传递过来的

    // 插入回复到数据库
    $sql = "INSERT INTO replies (post_id, content, reply_time) VALUES (:post_id, :content, NOW())";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':content', $content);
        $stmt->execute();

        // 重定向到帖子页面，显示回复成功
        header("Location: post_detail.php?id=$post_id");
    } catch (PDOException $e) {
        // 错误处理
        echo "错误: " . $e->getMessage();
    }
} else {
    // 如果不是POST请求，重定向回帖子列表页面
    header("Location: index.php");
}
?>