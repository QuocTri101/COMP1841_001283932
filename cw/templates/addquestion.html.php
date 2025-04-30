<form action="" method="post">
    <label>Type your question here:</label><br>
    <textarea name="question" rows="3" cols="40"></textarea><br><br>

    <label>Select an author:</label><br>
    <select name="authors">
        <option value="">Select an author</option>
        <?php foreach($authors as $author): ?>
            <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?=htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Select a category:</label><br>
    <select name="categories">
        <option value="">Select a category</option>
        <?php foreach($categories as $category): ?>
            <option value="<?=htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?=htmlspecialchars($category['cat_name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Type image file name (from 'images/' folder):</label><br>
    <input type="text" name="image" placeholder="example.jpg"><br><br>

    <input type="submit" name="submit" value="Add">
</form>