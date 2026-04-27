<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dept = $_POST['dept'];
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : "";
    $others = $_POST['others'];
    $user_email = $_POST['user_email'];
    // Secure password hashing
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, department, gender, hobbies, others, username_email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $fname, $lname, $dept, $gender, $hobbies, $others, $user_email, $pass);

    if ($stmt->execute()) {
        echo "<script>alert('Registration Successful!'); window.location='login.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}
?>