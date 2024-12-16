<?php
$filename = "questions.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$current_question = [];
$answers = [];
foreach ($questions as $line) {
    if (strpos($line, "Câu") === 0) {
        if (!empty($current_question)) {
            $answers[] = trim(substr($current_question[5], strpos($current_question[5], ":") + 1));
        }
        $current_question = [trim($line)];
    } elseif (strpos($line, "Đáp án:") !== false) {
        $current_question[] = trim($line);
    } else {
        $current_question[] = trim($line);
    }
}
if (!empty($current_question)) {
    $answers[] = trim(substr($current_question[5], strpos($current_question[5], ":") + 1));  // Add last answer
}

$score = 0;
foreach ($_POST as $key => $userAnswer) {
    $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
    if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
        $score++;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả bài trắc nghiệm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Kết quả bài trắc nghiệm</h1>
    <div class="alert alert-success text-center">
        Bạn trả lời đúng <strong><?php echo $score; ?></strong> / <?php echo count($answers); ?> câu.
    </div>
    <a href="index.php" class="btn btn-primary">Làm lại</a>
</div>
</body>
</html>
