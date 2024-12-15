<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $sql = "UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $description, $status, $id]);

    header('Location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$task = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
 body {
            background-image: url('timario.png'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #312f2e; /* Text color for better visibility on the background */
        }
        .container {
            
            margin-top: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: rgba(133, 112, 112, 0.8);
            background-color: #312f2e;
            color: #fff;
            opacity: 0.9
        }
        .table-container {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: rgba(245, 239, 239, 0.8); /* Slight white background for readability */
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .badge-custom {
            padding: 0.5rem 1rem;
            font-size: 1rem;
        }
    </style>
</head>
<body>

<div class="container">
<h3 class="text-center mb-4">
    <a href="index.php" class="text-white text-decoration-none">Edit Task</a>
</h3>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($task['description']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
