<?php
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

if (isset($_POST['message']) && isset($_POST['author']) && !empty($_POST['author'])) {
    try {
        $title = "Contact Us";
        $message = $_POST['message'];
        $author_id = $_POST['author']; // Get selected author ID

        // Insert message into database
        insertMessage($pdo, $_POST['message'], $_POST['author']);
        $output = "Thank you for your message! We will get back to you shortly.";

    } catch (PDOException $e) {
        $title = "An error has occurred";
        $output = "Database error: " . $e->getMessage();
    }
} else {
    $title = "Contact Us";
    $authors = allAuthors($pdo); // Fetch authors for dropdown
    ob_start();
    include 'templates/mailform.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';
?>