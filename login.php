<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST['user_email'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT fname, password FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Verify the hashed password
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user_name'] = $row['fname'];
            header("Location: dashboard.php");
        } else {
            echo "<script>alert('Invalid Password'); window.location='index.html';</script>";
        }
    } else {
        echo "<script>alert('User not found'); window.location='index.html';</script>";
    }
    $stmt->close();
}
?>