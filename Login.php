<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include("db_connection.php");

    // Get user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to check user credentials
    $query = "SELECT Uid, email, password FROM user WHERE email = ?";
    $stmt = $connection->prepare($query);

    if (!$stmt) {
        die("Error in statement preparation: " . $connection->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    if ($stmt->errno) {
        die("Error executing statement: " . $stmt->error);
    }

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session and redirect to dashboard
            $_SESSION['user_id'] = $row['Uid'];
            header("Location: AddnewCerForm.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "Invalid email address.";
    }

    $stmt->close();
    $connection->close();

    // Redirect with error message if authentication fails
    header("Location: login.html?error=$error_message");
    exit();
}
?>
