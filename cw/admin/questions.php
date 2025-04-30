<?php session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php'); // Not logged in → send to login
    exit();
}
?>
<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';


    $questions= allQuestions($pdo);
    $title='Question list';
    $totalQuestions = totalQuestions($pdo);
        
    ob_start();
    include '../templates/admin_questions.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title='An error has occured';
    $output='Database error:' . $e->getMessage();
}
include '../templates/admin_layout.html.php';?>

