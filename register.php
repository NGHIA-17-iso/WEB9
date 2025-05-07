<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body class="body2">
    <?php include 'navigation.php'; ?>
    <div class="container-register">
        <div class="register-form">
            <form action="process_register.php" method="post">
                <h1>Đăng ký</h1>
                <?php if (isset($_GET['error'])): ?>
                    <p style="color: red; text-align: center;"><?php echo htmlspecialchars($_GET['error']); ?></p>
                <?php endif; ?>
                <div class="input-box1">
                    <input type="text" name="username" placeholder="Tài khoản" required>
                </div>
                <div class="input-box1">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-box1">
                    <input type="password" name="password" placeholder="Mật khẩu" required>
                </div>
                <div class="input-box1">
                    <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
                </div>
                <div class="btn3">
                    <button type="submit">Đăng ký</button>
                </div>
                <div class="login-form">
                    <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>