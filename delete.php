<?php
// Include your database connection file
include("db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the certificate by ID
    $query = "DELETE FROM certificates WHERE ID = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect to EditDetails.php after successful deletion
        header("Location: EditDetails.php");
        exit();
    } else {
        // Handle error if deletion fails
        echo "Error deleting certificate: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    // Redirect to EditDetails.php if no ID is provided
    header("Location: EditDetails.php");
    exit();
}
?>
