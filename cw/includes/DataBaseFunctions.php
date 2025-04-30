<?php
function totalQuestions($pdo) {
    $query = $pdo->query('SELECT COUNT(*) FROM question WHERE deleted = 0');
    $row = $query->fetch();
    return $row[0];
}

function query($pdo,$sql,$parameters=[]){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}
function getQuestion($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM question WHERE id = :id AND deleted = 0', $parameters);
    
    $question = $query->fetch();
    return $question ?: null;
}

function updateQuestion($pdo, $questionId, $questionText, $imageName, $authorId, $categoryId) {
    $query = 'UPDATE question SET question = :question, image = :image, aut_id = :aut_id, cat_id = :cat_id WHERE id = :id';
    $parameters = [
        ':question' => $questionText,
        ':image' => $imageName,
        ':aut_id' => $authorId,
        ':cat_id' => $categoryId,
        ':id' => $questionId
    ];

    $stmt = $pdo->prepare($query);
    $stmt->execute($parameters);
}

function deleteQuestion($pdo, $id) {
    $query = 'UPDATE question SET deleted = 1 WHERE id = :id';
    $parameters = [':id' => $id];

    $stmt = $pdo->prepare($query);
    $stmt->execute($parameters);

}


function insertQuestion($pdo, $questiontext, $authorid, $categoryid,$image){
    $query = 'INSERT INTO question (question,`date`,aut_id,cat_id,`image`)
    VALUES (:question, CURDATE(), :aut_id, :cat_id, :image)';
    $parameters=[':question'=>$questiontext,':aut_id'=>$authorid,':cat_id'=>$categoryid,':image'=>$image];
    query($pdo,$query,$parameters);
}
function allAuthors($pdo){
    $authors = query($pdo, 'SELECT * FROM author');
    return $authors->fetchAll();
}
function allCategories($pdo){
    $categories = query($pdo, 'SELECT * FROM category');
    return $categories->fetchAll();
}
function allQuestions($pdo){
    $questions = query($pdo, 'SELECT question.id, question, image, `name`, email, cat_name, `date`
    FROM question
    INNER JOIN author ON aut_id=author.id
    INNER JOIN category ON cat_id=category.id
    WHERE deleted = 0  -- Ensures only non-deleted questions appear
    ORDER BY `date` DESC');
    return $questions->fetchAll();
}

function insertMessage($pdo, $message, $author_id) {
    $query = "INSERT INTO webmessage (message, date, aut_id) VALUES (:message, NOW(), :aut_id)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':message' => $message, ':aut_id' => $author_id]);
}
function getMessages($pdo) {
    $query = "SELECT webmessage.id, webmessage.message, webmessage.date, author.name 
              FROM webmessage 
              INNER JOIN author ON webmessage.aut_id = author.id 
              ORDER BY date DESC"; // Latest messages first

    $stmt = $pdo->query($query);
    return $stmt->fetchAll();
}
function getAnswer($pdo, $questionId) {
    $query = "SELECT answer.id, answer.answer, answer.ans_date, author.name 
              FROM answer 
              INNER JOIN author ON answer.aut_id = author.id 
              WHERE ques_id = :ques_id AND deleted = FALSE"; // Ignores hidden answers

    $stmt = $pdo->prepare($query);
    $stmt->execute([':ques_id' => $questionId]);

    return $stmt->fetchAll();
}


function insertAnswer($pdo, $questionId, $answerText, $authorId) {
    $query = "INSERT INTO answer (ques_id, answer, aut_id, ans_date, deleted) 
              VALUES (:ques_id, :answer, :aut_id, NOW(), FALSE)"; // Explicitly marks as visible

    $stmt = $pdo->prepare($query);
    return $stmt->execute([
        ':ques_id' => $questionId,
        ':answer' => $answerText,
        ':aut_id' => $authorId
    ]);
}
 
function updateAnswer($pdo, $answerId, $answerText, $authorId) {
    $query = "UPDATE answer 
              SET answer = :answer, aut_id = :aut_id 
              WHERE id = :id AND deleted = FALSE"; //  Prevents updating hidden answers

    $stmt = $pdo->prepare($query);
    return $stmt->execute([
        ':answer' => $answerText,
        ':aut_id' => $authorId,
        ':id' => $answerId
    ]);
}

function getAnswerById($pdo, $answerId) {
    $query = "SELECT id, answer, ans_date, aut_id FROM answer WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $answerId]);

    return $stmt->fetch() ?: null; // Ensures it returns NULL if no answer exists
}
function softDeleteAnswer($pdo, $answerId) {
    $query = "UPDATE answer SET deleted = TRUE WHERE id = :id"; //  Marks the answer as hidden
    $stmt = $pdo->prepare($query);
    return $stmt->execute([':id' => $answerId]);
}

