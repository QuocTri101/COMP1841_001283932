<?php
if(isset($_POST['question'])){
    try{
        include 'includes/DatabaseConnection.php';
        include 'includes/DataBaseFunctions.php';

        $image = $_POST['image']; 
        insertQuestion($pdo, $_POST['question'], $_POST['authors'], $_POST['categories'], $image);
        header('location:questions.php');
    }catch (PDOException $e){
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include 'includes/DatabaseConnection.php';
    include 'includes/DataBaseFunctions.php';
    $title = 'Add a new question';

    $authors = allAuthors($pdo);
    $categories = allCategories($pdo);
    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';