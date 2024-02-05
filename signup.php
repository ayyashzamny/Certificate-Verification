<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include("db_connection.php");


    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $error_message = "Passwords do not match";
        header("location: signup.php?error=$error_message");
        exit();
    }

    // Hash the password (use a strong hashing algorithm)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data into the database
    $query = "INSERT INTO user ( email, password) VALUES ( '$email', '$hashedPassword')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Registration successful, redirect to login page
        header("location: login.html");
        exit();
    } else {
        $error_message = "Error executing query: " . mysqli_error($connection);
        header("location: signup.php?error=$error_message");
        exit();
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
