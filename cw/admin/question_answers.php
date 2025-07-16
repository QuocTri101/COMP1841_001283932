<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

try {
    if (isset($_GET['ques_id'])) {
        $questionId = $_GET['ques_id'];
        
        // Fetch the selected question
        $query = "SELECT question, catg_name, name, email, date FROM question
                  INNER JOIN author ON question.aut_id = author.id
                  INNER JOIN category ON question.catg_id = category.id
                  WHERE question.id = :ques_id";

        $stmt = $pdo->prepare($query);
        $stmt->execute([':ques_id' => $questionId]);
        $question = $stmt->fetch() ?: null;

        // Fetch answers for the selected question
        $answers = getAnswer($pdo, $questionId);

        if (!$answers || !is_array($answers)) {
            $answers = []; // ✅ Ensures no errors when using `count($answers)`
        }

        // Fetch all authors for the dropdown list in the answer submission form
        $authors = allAuthors($pdo);

        // Start output buffering
        ob_start();
        include '../templates/admin_answers.html.php'; 
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


include '../templates/admin_answers_layout.html.php';
if (!$question) {
    header("Location:question_answers.php"); // ✅ Redirect if the question doesn't exist
    exit();
}

?>