<?php
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['name'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's Calculate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5 mx-auto p-4 border rounded">
    <h1>Welcome, <?php echo htmlspecialchars($username); ?></h1>
    <h3>Let's Calculate</h3>
   <?php include('display.php');?>
   <a href="history.php" class="btn btn-primary mb-1">See history</a><br>
   <a href="logout.php" class="btn btn-primary">Logout</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
