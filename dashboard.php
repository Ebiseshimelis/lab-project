<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h1>Welcome Page</h1>
        <p style="color: green; font-weight: bold;">You have successfully logged in.</p>
        <hr>
        <button class="btn btn-red" onclick="location.href='login.html'">Logout</button>
    </div>
</body>
</html>