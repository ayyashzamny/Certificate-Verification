<?php

    session_start();

    // Check if the user is not logged in, redirect to login page
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.html");
        exit();
    }

?>

<?php
if(isset($_SESSION['success_message'])) {
    echo '<div id="overlay" class="overlay">';
    echo '  <div class="success-message">' . $_SESSION['success_message'] . '</div>';
    echo '</div>';
    unset($_SESSION['success_message']);

}else if (isset($_SESSION['error_message'])){
    echo '<div id="Eoverlay" class="overlay">';
    echo '  <div class="error-message">' . $_SESSION['error_message'] . '</div>';
    echo '</div>';
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <link rel="stylesheet" href="Style/AddnewCerForm.css">
    <style>
       
    </style>
    <title>Certificate Deatils Form</title>
</head>
<style>
    .logo{
        width: 100px;
    }
</style>
<body>

    <ul>
        <li><a href="AddnewCerForm.php">Add new Certificate</a></li>
        <li><a href="EditDetails.php">All Deatils</a></li>
        <li style="float:right"><a class="active" href="logout.php">LogOut</a></li>
    </ul>
<br><br>
    <div class="registration-container">
        <img src="img/tti_logo.jpg" alt="logo" class="logo">
        <div class="form-container">
            <h1>Add new Certificate</h1>
            <form method="post" action="AddnewCer.php">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" required>

                <label for="course">Course:</label>
                <input type="text" id="course" name="course" required>

                <label for="certificateID">Certificate ID:</label>
                <input type="text" id="certificateID" name="certificateID" required>

                <label for="NIC">NIC:</label>
                <input type="text" id="NIC" name="NIC" required>

                <label for="SerialNo">Serial No:</label>
                <input type="text" id="SerialNo" name="SerialNo" required>

                <label for="IssuedDate">Issued Date:</label>
                <input type="date" id="IssuedDate" name="IssuedDate" required>

                <button type="submit" class="submit-btn">Submit</button>
                <button type="button" class="clear-btn">Clear</button>
            </form>
        </div>
    </div>

    <script>
        // Add this JavaScript for overlay and fade-out effect
        document.addEventListener('DOMContentLoaded', function() {
            var overlay = document.getElementById('overlay');
            if (overlay) {
                setTimeout(function() {
                    overlay.style.display = 'none';
                }, 500); // 2000 milliseconds = 2 seconds
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var overlay = document.getElementById('Eoverlay');
            if (overlay) {
                setTimeout(function() {
                    overlay.style.display = 'none';
                }, 1000); // 2000 milliseconds = 2 seconds
            }
        });
    </script>
</body>
</html>
