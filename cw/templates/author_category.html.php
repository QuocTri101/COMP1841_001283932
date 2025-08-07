<h2>Manage Users</h2>

<!-- Add or Edit User -->
<form method="POST" action="author_category.php">
  <input type="text" name="name" placeholder="Name" required
         value="<?= isset($_GET['edit_user']) ? htmlspecialchars($authors[array_search($_GET['edit_user'], array_column($authors, 'id'))]['name']) : '' ?>">
  <input type="email" name="email" placeholder="Email" required
         value="<?= isset($_GET['edit_user']) ? htmlspecialchars($authors[array_search($_GET['edit_user'], array_column($authors, 'id'))]['email']) : '' ?>">
  <?php if (isset($_GET['edit_user'])): ?>
    <input type="hidden" name="id" value="<?= (int) $_GET['edit_user'] ?>">
    <button type="submit" name="update_user">Update User</button>
    <a href="author_category.php">Cancel</a>
  <?php else: ?>
    <button type="submit" name="add_user">Add User</button>
  <?php endif; ?>
</form>

<ul>
<?php foreach ($authors as $author): ?>
  <li>
    <?= htmlspecialchars($author['name']) ?> (<?= htmlspecialchars($author['email']) ?>)
    <a href="author_category.php?edit_user=<?= $author['id'] ?>">Edit</a>
    <a href="author_category.php?delete_user=<?= $author['id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
  </li>
<?php endforeach; ?>
</ul>

<h2>Manage Categories</h2>

<!-- Add or Edit Category -->
<form method="POST" action="author_category.php">
  <input type="text" name="catg_name" placeholder="Category Name" required
         value="<?= isset($_GET['edit_category']) ? htmlspecialchars($categories[array_search($_GET['edit_category'], array_column($categories, 'id'))]['catg_name']) : '' ?>">
  <?php if (isset($_GET['edit_category'])): ?>
    <input type="hidden" name="id" value="<?= (int) $_GET['edit_category'] ?>">
    <button type="submit" name="update_category">Update Category</button>
    <a href="author_category.php">Cancel</a>
  <?php else: ?>
    <button type="submit" name="add_category">Add Category</button>
  <?php endif; ?>
</form>

<ul>
<?php foreach ($categories as $cat): ?>
  <li>
    <?= htmlspecialchars($cat['catg_name']) ?>
    <a href="author_category.php?edit_category=<?= $cat['id'] ?>">Edit</a>
    <a href="author_category.php?delete_category=<?= $cat['id'] ?>" onclick="return confirm('Delete this category?')">Delete</a>
  </li>
<?php endforeach; ?>
</ul>
