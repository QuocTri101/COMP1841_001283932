<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';
try{
    if(isset($_POST['question'])){

        updateQuestion($pdo, $_POST['question_id'], $_POST['question'], $_POST['image'], $_POST['authors'], $_POST['categories']);
        header('location:questions.php');
    }else{

        $question = getQuestion($pdo, $_GET['id']);
        $title = 'Edit question';
        $authors = allAuthors($pdo);
        $categories = allCategories($pdo);
        ob_start();
        include '../templates/editquestion.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occurred';
    $output = 'Error editing question: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';