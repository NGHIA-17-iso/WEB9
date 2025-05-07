<?php
session_start();
require_once 'include/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=Please login to view results");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'navigation.php'; ?>
    <div class="container">
        <h1 class="text-center my-4">Kết quả thi lý thuyết lái xe mô tô</h1>
        <?php
        $score = isset($_GET['score']) ? (int)$_GET['score'] : 0;
        $total = isset($_GET['total']) ? (int)$_GET['total'] : 0;
        if ($score > 0 || $total > 0):
        ?>
            <div style="text-align: center; padding: 20px; background-color: #fff; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
                <h2>Kỳ thi gần nhất: <?php echo $score; ?>/<?php echo $total; ?> điểm</h2>
                <p><?php echo $score >= 18 ? 'Chúc mừng! Bạn đã vượt qua kỳ thi.' : 'Rất tiếc! Bạn chưa đạt yêu cầu (cần ít nhất 18/20).'; ?></p>
                <div class="btn">
                    <a href="exam.php"><button>Thi lại</button></a>
                    <a href="study.php"><button>Ôn tập lại</button></a>
                </div>
            </div>
        <?php endif; ?>

        <h2 class="text-center my-4">Lịch sử thi</h2>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM exam_results WHERE user_id = ? ORDER BY exam_date DESC");
        $stmt->execute([$_SESSION['user_id']]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results):
        ?>
            <table style="width: 100%; border-collapse: collapse; background-color: #fff; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <thead>
                    <tr style="background-color: #f5f7fa;">
                        <th style="padding: 10px; border-bottom: 1px solid #ccc;">Ngày thi</th>
                        <th style="padding: 10px; border-bottom: 1px solid #ccc;">Điểm</th>
                        <th style="padding: 10px; border-bottom: 1px solid #ccc;">Tổng số câu</th>
                        <th style="padding: 10px; border-bottom: 1px solid #ccc;">Kết quả</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td style="padding: 10px; border-bottom: 1px solid #ccc; text-align: center;"><?php echo $result['exam_date']; ?></td>
                            <td style="padding: 10px; border-bottom: 1px solid #ccc; text-align: center;"><?php echo $result['score']; ?></td>
                            <td style="padding: 10px; border-bottom: 1px solid #ccc; text-align: center;"><?php echo $result['total_questions']; ?></td>
                            <td style="padding: 10px; border-bottom: 1px solid #ccc; text-align: center;"><?php echo $result['score'] >= 18 ? 'Đạt' : 'Không đạt'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align: center; padding: 20px; background-color: #fff; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">Bạn chưa có lịch sử thi nào.</p>
        <?php endif; ?>
    </div>
</body>
</html>