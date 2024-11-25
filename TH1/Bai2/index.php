<?php
$filename = "questions.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$current_question = [];
$questions_data = [];
foreach ($questions as $line) {
    if (strpos($line, "Câu") === 0) {
        if (!empty($current_question)) {
            $questions_data[] = $current_question;
        }
        $current_question = [trim($line)];
    } elseif (strpos($line, "Đáp án:") !== false) {
        $current_question[] = trim($line);
    } else {
        $current_question[] = trim($line);
    }
}
if (!empty($current_question)) {
    $questions_data[] = $current_question;  
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập trắc nghiệm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Bài tập trắc nghiệm</h1>
    <form action="result.php" method="post">
        <?php foreach ($questions_data as $index => $question): ?>
            <div class="card mb-4">
                <div class="card-header"><strong><?php echo $question[0]; ?></strong></div>
                <div class="card-body">
                    <?php
                    for ($i = 1; $i <= 4; $i++) {
                        $answer = substr($question[$i], 0, 1); // A, B, C, D
                        echo "<div class='form-check'>";
                        echo "<input class='form-check-input' type='radio' name='question{$index}' value='{$answer}' id='question{$index}{$answer}'>";
                        echo "<label class='form-check-label' for='question{$index}{$answer}'>{$question[$i]}</label>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>
</div>
</body>
</html>
