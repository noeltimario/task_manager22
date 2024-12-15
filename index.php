<?php
include 'db.php';

// Fetch tasks from the database
$sql = "SELECT * FROM tasks";
$stmt = $conn->query($sql);
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TIMARIO TMS</title>
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

    </style>
</head>
<body>

<div class="container">
<h3 class="text-center mb-4">
    <a href="index.php" class="text-white text-decoration-none">Task Management System</a>
</h3>

    <div class="d-flex justify-content-center mb-4">
        <a href="create_task.php" class="btn btn-primary btn-lg">Create New Task</a>
    </div>

    <div class="table-container">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark bg-dark text-white">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= htmlspecialchars($task['title']) ?></td>
                        <td><?= htmlspecialchars($task['description']) ?></td>
                        <td>
                            <span class="badge badge-custom <?= $task['status'] == 'completed' ? 'bg-success' : 'bg-warning' ?>">
                                <?= ucfirst($task['status']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="edit_task.php?id=<?= $task['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_task.php?id=<?= $task['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
