<?php
session_start();
require_once 'include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php?error=Please login to take the exam");
        exit;
    }

    $answers = $_POST['answer'] ?? [];
    $score = 0;
    $total_questions = count($answers);

    // Lấy đáp án đúng từ database
    $stmt = $pdo->query("SELECT id, correct_answer FROM questions");
    $correct_answers = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

    // Tính điểm
    foreach ($answers as $question_id => $user_answer) {
        if (isset($correct_answers[$question_id]) && $user_answer === $correct_answers[$question_id]) {
            $score++;
        }
    }

    // Lưu kết quả vào bảng exam_results
    $stmt = $pdo->prepare("INSERT INTO exam_results (user_id, score, total_questions, exam_date) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$_SESSION['user_id'], $score, $total_questions]);

    // Chuyển hướng đến trang kết quả
    header("Location: result.php?score=$score&total=$total_questions");
    exit;
}
?>