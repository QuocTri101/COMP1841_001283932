<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

try {
    $title = 'User Message';
    $messages = getMessages($pdo); // ✅ Fetch messages from the database

    ob_start();
    include '../templates/admin_messages.html.php'; // ✅ Load message template
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = '<p style="color: red;">Database error: ' . $e->getMessage() . '</p>';
}

include '../templates/admin_layout.html.php';
?>