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
                <?=htmlspecialchars($category['catg_name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <!-- Upload an Image -->
    <label for="image">Choose an Image (from cw/images folder):</label>
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
</form>