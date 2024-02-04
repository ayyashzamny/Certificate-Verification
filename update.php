<?php
// Include your database connection file
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $fullName = $_POST["fullName"];
    $course = $_POST["course"];
    $nic = $_POST["nic"];
    $cerID = $_POST["cerID"];
    $serialNo = $_POST["serialNo"];
    $issuedDate = $_POST["issuedDate"];

    // Update the certificate data in the database
    $query = "UPDATE certificates SET Name = '$fullName', Course = '$course', NIC = '$nic', CerID = '$cerID', SerialNo = '$serialNo', Date = '$issuedDate' WHERE ID = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect to EditDetails.php after successful update
        header("Location: EditDetails.php");
        exit();
    } else {
        // Handle error if update fails
        echo "Error updating certificate: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    // Redirect to EditDetails.php if accessed directly without a POST request
    header("Location: EditDetails.php");
    exit();
}
?>
