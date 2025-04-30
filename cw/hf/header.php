<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"> <!-- shared stylesheet -->
</head>
<body>

<header>
    <?php if (isset($adminPage) && $adminPage): ?>
        <h1>Online Student Question Database </br>
        Manage questions, categories and authors</h1>
    <?php else: ?>
        <h1>Online Student Question Database</h1>
    <?php endif; ?>

</header>
