<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';
try{
    if(isset($_POST['question'])){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['question'])) {
            $imageFile = $_FILES['image'] ?? null; // Check if image file exists
        
            if ($imageFile && $imageFile['error'] === 0) {
                $fileName = basename($imageFile['name']);
                $destination = "../images/" . $fileName;
        
                // Move uploaded file to images folder
                if (move_uploaded_file($imageFile['tmp_name'], $destination)) {
                    $_POST['image'] = $fileName; // Store filename to update in DB
                }
            }
        
        updateQuestion($pdo, $_POST['question_id'], $_POST['question'], $_POST['image'], $_POST['authors'], $_POST['categories']);
        header('location:questions.php');
    }}else{

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