<?php
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $id = htmlspecialchars(trim($_POST['student_id']));
    $email = htmlspecialchars(trim($_POST['email']));
    $grades = htmlspecialchars(trim($_POST['grades']));
    $address = htmlspecialchars(trim($_POST['address']));
    $gender = htmlspecialchars(trim($_POST['gender']));

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO student_infos (name, student_id, email, grades, address, gender) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $id, $email, $grades, $address, $gender);

    // Execute statement and check for errors
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
