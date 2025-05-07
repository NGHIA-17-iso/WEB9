<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body class="body1">
    <?php include 'navigation.php'; ?>
    <div class="container-form">
        <div class="form">
            <h1>Đăng nhập</h1>
            <?php if (isset($_GET['error'])): ?>
                <p style="color: red; text-align: center;"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>
            <?php if (isset($_GET['success'])): ?>
                <p style="color: green; text-align: center;"><?php echo htmlspecialchars($_GET['success']); ?></p>
            <?php endif; ?>
            <form action="process_login.php" method="post">
                <div class="input-box">
                    <input type="text" name="username" placeholder="Tài khoản" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Mật khẩu" required>
                </div>
                <div class="remember-me">
                    <label><input type="checkbox" name="remember"> Ghi Nhớ</label>
                    <a href="#">Quên mật khẩu</a>
                </div>
                <div class="enter">
                    <button type="submit">Đăng nhập</button>
                </div>
                <div class="register">
                    <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>