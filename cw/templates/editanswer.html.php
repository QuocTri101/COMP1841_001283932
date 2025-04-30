<form action="editanswer.php" method="post">
    <input type="hidden" name="answer_id" value="<?=htmlspecialchars($answer['id'], ENT_QUOTES, 'UTF-8');?>">

    <label for="answer">Edit your answer here:</label>
    <textarea name="answer" rows="3" cols="40" required><?=htmlspecialchars($answer['answer'], ENT_QUOTES, 'UTF-8');?></textarea>

    <!-- Author Selection -->
    <label for="aut_id">Select an Author:</label>
    <select name="aut_id" required>
        <option value="">Select an author</option>
        <?php foreach ($authors as $author): ?>
            <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8');?>"
                <?=($author['id'] == $answer['aut_id']) ? 'selected' : '';?>> 
                <?=htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8');?>
            </option>
        <?php endforeach;?>
    </select>

    <br>
    <input type="submit" name="submit" value="Save" class="edit-btn">
</form>