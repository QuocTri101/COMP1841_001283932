<p><?= $totalQuestions ?> Questions have been submitted to the Internet Question Database.</p>

<?php
$max = count($questions);

for ($i = 0; $i < $max; $i++): 
    $question = $questions[$i] ?? null;

    if (!$question) continue;

    $img = $question['image'] ?? null;
?>

<blockquote>
<table border="0">
    <tr>
        <td width="300px">
            <a href="question_answers.php?ques_id=<?=htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8')?>" class="btn-link">
            <?=htmlspecialchars($question['question'], ENT_QUOTES, 'UTF-8')?>
            </a>
            <br/>
            <?=htmlspecialchars($question['catg_name'], ENT_QUOTES, 'UTF-8')?>
            (by <a href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8');?>">
                <?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8');?></a>)
        </td>
        <td width="150px">
            <?=htmlspecialchars(date("D d M Y", strtotime($question['date'])), ENT_QUOTES, 'UTF-8')?>
        </td>
        <td width="150px">
            <?php if ($img): ?>
                <img src="images/<?=htmlspecialchars($img, ENT_QUOTES, 'UTF-8')?>
                " alt="Question Image" style="max-width: 200px; margin: 10px;" />
            <?php else: ?>
                <p style="color: red;">No image available</p>
            <?php endif; ?>
        </td>
    </tr>
</table>
</blockquote>

<?php endfor; ?> <!-- Ensure the loop closes properly -->

