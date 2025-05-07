<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=Bạn cần phải đăng nhập để làm bài thi!");
    exit;
}
require_once 'include/config.php';
$stmt = $pdo->query("SELECT * FROM questions ORDER BY RAND() LIMIT 20");
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thi lý thuyết</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'navigation.php'; ?>
    <div class="container">
        <h1 class="text-center my-4">Thi lý thuyết lái xe mô tô</h1>
        <form method="POST" action="submit_exam.php">
            <?php foreach ($questions as $index => $question): ?>
                <div class="question" data-correct-answer="<?php echo $question['correct_answer']; ?>">
                    <p><strong>Câu hỏi <?php echo $index + 1; ?>:</strong> <?php echo htmlspecialchars($question['question_text']); ?></p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer[<?php echo $question['id']; ?>]" id="q<?php echo $question['id']; ?>a" value="A" required>
                        <label class="form-check-label" for="q<?php echo $question['id']; ?>a">A. <?php echo htmlspecialchars($question['option_a']); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer[<?php echo $question['id']; ?>]" id="q<?php echo $question['id']; ?>b" value="B">
                        <label class="form-check-label" for="q<?php echo $question['id']; ?>b">B. <?php echo htmlspecialchars($question['option_b']); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer[<?php echo $question['id']; ?>]" id="q<?php echo $question['id']; ?>c" value="C">
                        <label class="form-check-label" for="q<?php echo $question['id']; ?>c">C. <?php echo htmlspecialchars($question['option_c']); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer[<?php echo $question['id']; ?>]" id="q<?php echo $question['id']; ?>d" value="D">
                        <label class="form-check-label" for="q<?php echo $question['id']; ?>d">D. <?php echo htmlspecialchars($question['option_d']); ?></label>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="btn">
                <button type="submit">Nộp bài</button>
            </div>
        </form>
    </div>
</body>
</html>