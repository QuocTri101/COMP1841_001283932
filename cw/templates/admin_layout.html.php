<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title><?=$title?></title>
    <script src="../includes/HTMLFunctions.js"></script>

</head>

<body>
<?php $adminPage = true; ?>
<div id="admin">
    <?php include('../hf/header.php'); ?>

    <nav>
        <ul>
            <!--<li><a href="index.php">Home</a></li>-->
            <li><a href="../admin/questions.php">Question List</a></li>
            <li><a href="../admin/addquestion.php">Add a new question</a></li>
            <li><a href="../index.php">Public Site</a></li>
            <li><a href="../admin/messages.php">User Message</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <?=$output?>
    </main>
    <?php include('../hf/footer.php'); ?>
</div>
</body>

</html>