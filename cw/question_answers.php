<?php
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

try {
    if (isset($_GET['ques_id'])) {
        $questionId = $_GET['ques_id'];

        // Fetch the selected question
        $query = "SELECT question, cat_name, name, email, date FROM question
                  INNER JOIN author ON question.aut_id = author.id
                  INNER JOIN category ON question.cat_id = category.id
                  WHERE question.id = :ques_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':ques_id' => $questionId]);
        $question = $stmt->fetch();

        // Fetch answers for the selected question
        $answers = getAnswer($pdo, $questionId);

        // Fetch all authors for the dropdown list in the answer submission form
        $authors = allAuthors($pdo);

        // Start output buffering
        ob_start();
        include 'templates/answers.html.php'; 
        $output = ob_get_clean();
    } else {
        $title = 'Error';
        $output = "<p style='color: red;'>Error: No question selected.</p>";
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = '<p style="color: red;">Database error: ' . $e->getMessage() . '</p>';
}

// Include the main layout
include 'templates/answers_layout.html.php';
?>