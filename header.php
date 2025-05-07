<?php session_start(); ?>
<div class="header">
    <h1>Trang ôn tập và thi lý thuyết lái xe mô tô</h1>
    <div class="img">
        <img src="images/logo.png" style="width: 120px;">
    </div>
    <div class="navi">
        <?php if (isset($_SESSION['user_id'])): ?>
            <span>Xin chào, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?>!</span>
            <a href="logout.php">Đăng xuất</a>
        <?php else: ?>
            <a href="login.php">Đăng nhập</a>
            <a href="register.php">Đăng Ký</a>
        <?php endif; ?>
    </div>
</div>