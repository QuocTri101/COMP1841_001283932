<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="question_id" value="<?=htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8');?>">

    <label for="question">Edit your question here:</label>
    <textarea name="question" rows="3" cols="40"><?=htmlspecialchars($question['question'], ENT_QUOTES, 'UTF-8');?></textarea>

    <!-- Author Selection -->
    <label for="authors">Select an Author:</label>
    <select name="authors">
        <option value="">Select an author</option>
        <?php foreach ($authors as $author): ?>
            <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8');?>"
                <?=($author['id'] == $question['aut_id']) ? 'selected' : '';?>> 
                <?=htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8');?>
            </option>
        <?php endforeach;?>
    </select>

    <!-- Category Selection -->
    <label for="categories">Select a Category:</label>
    <select name="categories">
        <option value="">Select a category</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?=htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8');?>"
                <?=($category['id'] == $question['cat_id']) ? 'selected' : '';?>> 
                <?=htmlspecialchars($category['cat_name'], ENT_QUOTES, 'UTF-8');?>
            </option>
        <?php endforeach;?>
    </select>

    <!-- Insert Photo Name Instead of Uploading a File -->
    <label for="image">Image Name (.jpg, .png, etc.):</label>
    <input type="text" name="image" id="image" value="<?=htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8');?>">
    <br>
    <input type="submit" name="submit" value="Save" class="edit-btn">
</form>