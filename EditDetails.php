<?php
// Include your database connection file
include("db_connection.php");

// Fetch certificates data from the database
$query = "SELECT * FROM certificates";
$result = mysqli_query($connection, $query);

// Check if there are any certificates
if ($result) {
    $certificatesData = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $certificatesData = array(); // Empty array if no data or error
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificates Table</title>
    <link rel="stylesheet" href="Style/EditDetailsStyle.css"> <!-- Link to your CSS file -->
</head>
<body>

    <ul>
        <li><a href="AddnewCerForm.php">Add new Certificate</a></li>
        <li><a href="EditDetails.php" >All Deatils</a></li>
        <li style="float:right"><a href="#about"class="active">LogOut</a></li>
    </ul>

<h2>Certificates Table</h2>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>NIC</th>
            <th>Certificate ID</th>
            <th>Serial No</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($certificatesData as $certificate): ?>
            <tr>
                <td><?php echo $certificate['ID']; ?></td>
                <td><?php echo $certificate['Name']; ?></td>
                <td><?php echo $certificate['Course']; ?></td>
                <td><?php echo $certificate['NIC']; ?></td>
                <td><?php echo $certificate['CerID']; ?></td>
                <td><?php echo $certificate['SerialNo']; ?></td>
                <td><?php echo $certificate['Date']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $certificate['ID']; ?>" class="edit-btn">Edit</a>
                    <a href="delete.php?id=<?php echo $certificate['ID']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this certificate?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
