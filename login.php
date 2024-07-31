<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check in the first table
    $stmt = $conn->prepare("SELECT * FROM job_seekers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found in the first table
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo "Login successful. Welcome, " . $user['name'] . "!";
        } else {
            echo "Invalid email or password.";
        }
    } else {
        // Check in the second table
        $stmt->prepare("SELECT * FROM employers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found in the second table
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                echo "Login successful. Welcome, " . $user['name'] . "!";
            } else {
                echo "Invalid email or password.";
            }
        } else {
            echo "Invalid email or password.";
        }
    }

    $stmt->close();
}

$conn->close();
?>
