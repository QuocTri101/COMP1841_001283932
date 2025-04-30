<form action="" method="post">
    <textarea name="message" rows="15" cols="40"></textarea><br />
    <input type="submit" value="Send Message">
    
    <select name="author">
        <option value="">Select an author</option>
        <?php foreach ($authors as $author): ?>
            <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?=htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>
