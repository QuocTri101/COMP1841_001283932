<?php
include '../includes/DatabaseConnection.php'; // Include your DB connection
$query = $pdo->query("SELECT image FROM question");
$images = $query->fetchAll(PDO::FETCH_COLUMN);

// Print all stored images for review
var_dump($images);
?>
<img src="../images/birb.jpg" alt="Image Test" />
<!-- <?php foreach ($images as $img): ?> -->
    <!-- <p>Image Path Debug: <strong>../images/<?=htmlspecialchars($img, ENT_QUOTES, 'UTF-8')?></strong></p> -->
    <!-- <img src="../images/<?=htmlspecialchars($img, ENT_QUOTES, 'UTF-8')?>" alt="Image" style="max-width: 200px; margin: 10px;" /> -->
<!-- <?php endforeach; ?> -->
