<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title><?=$title?></title>
    
</head>
<body>
<?$adminPage = false; ?>
<?php include('hf/header.php'); ?>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="questions.php">Question List</a></li>
            <li><a href="addquestion.php">Add a new question</a></li>
            <li><a href="admin/questions.php">Admin</a></li>
            <li><a href="contact.php">Contact us</a></li>
        </ul>
    
    </nav>
    <main>
        <?=$output?>
    </main>   
<?php include('hf/footer.php'); ?>
</body>
</html>