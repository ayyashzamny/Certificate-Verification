<?php
session_start();

// Include your database connection file
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $fullName = $_POST["fullName"];
    $course = $_POST["course"];
    $certificateID = $_POST["certificateID"];
    $NIC = $_POST["NIC"];
    $SerialNo = $_POST["SerialNo"];
    $IssuedDate = $_POST["IssuedDate"];

    // Check if the certificate ID already exists in the database
    $checkQuery = "SELECT * FROM certificates WHERE CerID = '$certificateID'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if ($checkResult === false) {
        die("Error in check query: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['error_message'] = "Certificate ID already exists. Please choose a different one.";
        header("location: AddnewCerForm.php");
        exit();
    }

   

    // SQL query to insert certificate data into the database, including the current date and time
    $insertQuery = "INSERT INTO certificates (`Name`, Course, NIC ,CerID, SerialNo, `Date`) 
    VALUES ('$fullName', '$course', '$NIC' , '$certificateID', '$SerialNo' , '$IssuedDate')";
    
    $result = mysqli_query($connection, $insertQuery);

    if ($result) {
        // Certificate added successfully
        $_SESSION['success_message'] = "Certificate added successfully!";
        header("location: AddnewCerForm.php");
        exit();
    } else {
        $error_message = "Error executing query: " . mysqli_error($connection);
        header("location: AddnewCerForm.php?error=$error_message"); // Redirect back to the form with an error message
        exit();
    }
}

// Close the database connection
mysqli_close($connection);
?>
