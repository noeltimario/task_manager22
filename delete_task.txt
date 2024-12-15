<?php
include 'db.php';

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE SQL query
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Execute the query with the provided task ID
    $stmt->execute([$id]);

    // Redirect back to the index page after deletion
    header('Location: index.php');
    exit();
} else {
    // If no ID is provided, redirect to index page
    header('Location: index.php');
    exit();
}
?>
