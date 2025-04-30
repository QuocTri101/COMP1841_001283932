<!-- templates/answers.html.php -->
<section class="answer-box">
    <h3>Answers:</h3>
    <table class="answer-table">
        <?php if (count($answers) > 0): ?>
            <?php foreach ($answers as $answer): ?>
                <tr>
                    <td class="answer-content"><?=htmlspecialchars($answer['answer'], ENT_QUOTES, 'UTF-8')?></td>
                    <td class="answer-meta">
                        <small>Answered by <strong><?=htmlspecialchars($answer['name'], ENT_QUOTES, 'UTF-8')?></strong> on 
                        <?=htmlspecialchars(date("D d M Y", strtotime($answer['ans_date'])), ENT_QUOTES, 'UTF-8')?></small>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2" class="no-answer">No answers available for this question.</td>
            </tr>
        <?php endif; ?>
    </table>
</section>

<!-- Answer Submission Form -->
<section class="answer-box">
    <h3>Submit Your Answer:</h3>
    <form action="submit_answer.php" method="post">
        <input type="hidden" name="ques_id" value="<?=htmlspecialchars($questionId, ENT_QUOTES, 'UTF-8')?>">

        <label for="author">Select an Author:</label>
        <select name="aut_id" id="author" required>
            <option value="">Select an author</option>
            <?php foreach ($authors as $author): ?>
                <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?=htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label for="answer">Your Answer:</label>
        <textarea name="answer" id="answer" rows="4" required></textarea>
        
        <button type="submit" class="btn">Submit Answer</button>
    </form>
</section>