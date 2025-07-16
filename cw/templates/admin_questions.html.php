<p><?=$totalQuestions?> Questions have been submitted to the Internet Question Database.</p>

<?php
$max = count($questions); // Only rely on questions count

for ($i = 0; $i < $max; $i++):
    $question = $questions[$i] ?? null;

    if (!$question) continue; // Skip if there's no question

    $img = $question['image'] ?? null; // Use image stored in the database
?>
<blockquote>
<table border='0px'>
    <tr>
        <td width='300px'>
            <a href="../admin/question_answers.php?ques_id=<?=htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8')?>" class="btn-link">
            <?=htmlspecialchars($question['question'], ENT_QUOTES, 'UTF-8')?>
            </a>
            <br/>
            <?=htmlspecialchars($question['catg_name'], ENT_QUOTES, 'UTF-8')?>
            (by <a href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8');?>"><?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8');?></a>)
        <br/>
            <a href="editquestion.php?id=<?=$question['id']?>" class="btn edit-btn">Edit</a>
            <a href="deletequestion.php?id=<?=htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8')?>" 
                class="btn delete-btn" 
                onclick="return confirm('Are you sure you want to delete this question?');">Delete
            </a>

        </td>
        <td width='150px'>
            <?=htmlspecialchars(date("D d M Y", strtotime($question['date'])), ENT_QUOTES, 'UTF-8')?>
        </td>
        <td width='150px'>
            <?php if ($img && file_exists("../images/" . $img)): ?>
                <img src="../images/<?=htmlspecialchars($img, ENT_QUOTES, 'UTF-8')?>" alt="Question Image" style="max-width: 200px; margin: 10px;" />
            <?php else: ?>
                <img src="../images/no-image.png" alt="No Image Available" style="max-width: 200px; margin: 10px; border: 1px solid #ccc;" />
            <?php endif; ?>
        </td>

    </tr>
</table>
</blockquote>

<?php endfor; ?>