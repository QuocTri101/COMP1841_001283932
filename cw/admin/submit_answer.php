<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

$title = "Submit Answer"; // Default title
var_dump($_POST);
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $questionId = $_POST['ques_id'];
        $authorId = $_POST['aut_id'];
        $answerText = $_POST['answer'];

        // Validate input
        if (empty($questionId) || empty($authorId) || empty($answerText)) {
            echo "<p style='color: red;'>Error: All fields are required.</p>";
            exit();
        }

        // Validate author using `allAuthors()`
        $authors = allAuthors($pdo);
        $validAuthorIds = array_column($authors, 'id'); // ✅ Extract IDs for validation

        if (!in_array($authorId, $validAuthorIds)) {
            echo "<p style='color: red;'>Error: Author not found.</p>";
            exit();
        }


        // Insert the answer into the database using `insertAnswer` function
        $success = insertAnswer($pdo, $questionId, $answerText, $authorId);

        if ($success) {
            header("Location: question_answers.php?ques_id=" . $questionId);
            exit();
        } else {
            echo "<p style='color: red;'>Error: Failed to insert answer.</p>";
        }
    }
} catch (PDOException $e) {
    echo "<p style='color: red;'>Database error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
    exit();
}
?>