<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';

    $id = $_POST['id'] ?? $_GET['id'] ?? null; // Accept both POST and GET

    if ($id) {
        softDeleteAnswer($pdo, $id); // ✅ Calls function to mark answer as hidden
        header('Location: question_answers.php?ques_id=' . $_GET['ques_id']); // ✅ Redirects to the question page
        exit();
    } else {
        echo "<p style='color: red;'>Error: No ID provided for deletion.</p>";
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to hide answer: ' . $e->getMessage();
}

include '../templates/admin_answer_layout.html.php';
?>