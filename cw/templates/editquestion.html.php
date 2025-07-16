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


    <!-- Upload an Image -->
    <label for="image">Choose an Image (from the cw/images folder):</label>
    <input type="file" name="image" id="image" accept=".jpg, .png, .jpeg" onchange="previewImage(event)">
    <br>

    <!--  Display Image Preview -->
    <img id="image-preview" src="#" alt="Image Preview" style="max-width: 200px; margin-top: 10px; display: none;">

<!--  JavaScript for Live Image Preview -->
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const preview = document.getElementById("image-preview");
        preview.src = reader.result;
        preview.style.display = "block"; //  Shows the preview
    };
    reader.readAsDataURL(event.target.files[0]); //  Converts image to preview
}
</script>

    <input type="submit" name="submit" value="Save" class="edit-btn">
</form>