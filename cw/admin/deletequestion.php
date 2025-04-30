<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';
    $id = $_POST['id'] ?? $_GET['id'] ?? null; // Accept both POST and GET

        if ($id) {
            deleteQuestion($pdo, $id); // Call the function to mark as deleted
            header('Location: questions.php');
            exit();
        } else {
            echo "<p style='color: red;'>Error: No ID provided for deletion.</p>";
        }

}catch(PDOException $e){
    $title='An error has occured';
    $output='Unable to connect to delete question: ' .$e->getMessage();
}
include '../templates/admin_layout.html.php';