<?php
// Include your database connection file
include("db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch certificate data by ID
    $query = "SELECT * FROM certificates WHERE ID = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $certificateData = mysqli_fetch_assoc($result);
    } else {
        $certificateData = array(); // Empty array if no data or error
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    // Redirect to EditDetails.php if no ID is provided
    header("Location: EditDetails.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Certificate</title>

    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="Style/AddnewCerForm.css"> <!-- Link to your CSS file -->
</head>
<body>

<style>
    .editform{
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-left: 10vw;
        margin-right: 10vw;
        margin-top: 20px;
    }
    
</style>

    <ul>
        <li><a href="AddnewCerForm.php">Add new Certificate</a></li>
        <li><a href="EditDetails.php" class="active">All Details</a></li>
        <li style="float:right"><a href="#about" class="active">LogOut</a></li>
    </ul>

    <h2>Edit Certificate</h2>

    <div class="editform">
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $certificateData['ID']; ?>">

            <!-- Add other form fields for editing -->
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" value="<?php echo $certificateData['Name']; ?>" required>

            <label for="course">Course:</label>
            <input type="text" id="course" name="course" value="<?php echo $certificateData['Course']; ?>" required>

            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" value="<?php echo $certificateData['NIC']; ?>" required>

            <label for="cerID">Certificate ID:</label>
            <input type="text" id="cerID" name="cerID" value="<?php echo $certificateData['CerID']; ?>" required>

            <label for="serialNo">Serial No:</label>
            <input type="text" id="serialNo" name="serialNo" value="<?php echo $certificateData['SerialNo']; ?>" required>

            <label for="issuedDate">Issued Date:</label>
            <input type="date" id="issuedDate" name="issuedDate" value="<?php echo $certificateData['Date']; ?>" required>

            <button type="submit" class="submit-btn">Update</button>
        </form>


    </div>
    

    
</body>
</html>
