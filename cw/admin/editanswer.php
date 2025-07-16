<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

try {

    if (isset($_POST['answer'])) { //When form is submitted, update the answer

        updateAnswer($pdo, $_POST['answer_id'], $_POST['answer'], $_POST['aut_id']);
        header("Location: ../admin/questions.php?"); // Redirect back to answers list
        exit();

    } else { // Otherwise, retrieve the answer for editing

        $answer = getAnswerById($pdo, $_GET['id']);
        $title = 'Edit Answer';
        $authors = allAuthors($pdo); // Load authors for selection
        
        ob_start();
        include '../templates/editanswer.html.php'; // New template for editing answers
        
        $output = ob_get_clean();
    }

} catch (PDOException $e) {
    $title = 'Error occurred';
    $output = 'Error editing answer: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';