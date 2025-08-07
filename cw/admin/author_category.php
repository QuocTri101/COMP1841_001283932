<?php
// Connect to the database and load functions
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php'; // fix spelling (DataBaseFunctions → DatabaseFunctions)

// Wrap everything in try-catch to handle database errors safely
try {
    // Handle form submissions
    if (isset($_POST['add_user']) && !empty($_POST['name']) && !empty($_POST['email'])) {
        addUser($pdo, $_POST['name'], $_POST['email']);
    }

    if (isset($_GET['delete_user']) && is_numeric($_GET['delete_user'])) {
        deleteUser($pdo, $_GET['delete_user']);
    }

    if (isset($_POST['update_user']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['id'])) {
    updateUser($pdo, $_POST['id'], $_POST['name'], $_POST['email']);
    }
    if (isset($_POST['add_category']) && !empty($_POST['catg_name'])) {
    addCategory($pdo, $_POST['catg_name']);
    }
    if (isset($_GET['delete_category']) && is_numeric($_GET['delete_category'])) {
        deleteCategory($pdo, $_GET['delete_category']);
    }
    if (isset($_POST['update_category']) && !empty($_POST['catg_name']) && !empty($_POST['id'])) {
    updateCategory($pdo, $_POST['id'], $_POST['catg_name']);
    }

    // Retrieve all authors and categories
    $authors = allAuthors($pdo);
    $categories = allCategories($pdo);

    // Buffer output to inject into layout
    ob_start();
    include('../templates/author_category.html.php');
    $output = ob_get_clean();

    $title = 'Manage Users & Categories';

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

// Render final layout
include('../templates/admin_layout.html.php');
