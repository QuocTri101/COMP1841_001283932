<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Question & Answers</title>
</head>
<body>
<?php $adminPage = true; ?>
<div id="admin">
    <?php include '../hf/header.php';?>

    <main class="main-content">
        <section class="question-box">
            <h2><?=htmlspecialchars($question['question'], ENT_QUOTES, 'UTF-8')?></h2>
            <p class="question-meta">Category: <strong><?=htmlspecialchars($question['cat_name'], ENT_QUOTES, 'UTF-8')?></strong></p>
            <p class="question-meta">
                Asked by <a href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8');?>">
                <?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8');?></a> on 
                <strong><?=htmlspecialchars(date("D d M Y", strtotime($question['date'])), ENT_QUOTES, 'UTF-8')?></strong>
            </p>
        </section>

        <!-- 🛠 Now including the answers template -->
        <?php include '../templates/admin_answers.html.php'; ?>

        <br>
        <a href="questions.php" class="btn">← Back to Questions</a>
    </main>
    <?php include '../hf/footer.php';?>
</div>
</body>
</html>
