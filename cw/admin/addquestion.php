<?php
if(isset($_POST['question'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunctions.php';

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
        }    
        $image = $_POST['image']; 
        insertQuestion($pdo, $_POST['question'], $_POST['authors'], $_POST['categories'], $image);
        header('location:questions.php');
    }catch (PDOException $e){
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';
    $title = 'Add a new question';

    $authors = allAuthors($pdo);
    $categories = allCategories($pdo);
    ob_start();
    include '../templates/addquestion.html.php';
    $output = ob_get_clean();
}
include '../templates/admin_layout.html.php';