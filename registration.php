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
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Name validation: only letters allowed
    if (!preg_match("/^[a-zA-Z]+$/", $fname) || !preg_match("/^[a-zA-Z]+$/", $lname)) {
        echo "<script>alert('First and Last names must contain letters only.'); window.history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO users (fname, lname, dept, gender, hobbies, others, user_email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $fname, $lname, $dept, $gender, $hobbies, $others, $user_email, $pass);

    if ($stmt->execute()) {
        echo "<script>alert('Registration Successful!'); window.location='index.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}
?>