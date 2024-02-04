<?php
    session_start();
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
    <link rel="stylesheet" href="Style/AddnewCer.css">
    <style>
       
    </style>
    <title>Certificate Deatils Form</title>
</head>
<style>
    .logo{
        width: 100px;
    }

    /* Add this CSS for overlay and success message */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .success-message {
        background-color: #4CAF50; /* Green background color for success message */
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }

    .error-message {
        background-color: #dc4729; /* Green background color for success message */
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }
    
    li {
        float: left;
    }
    
    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    
    li a:hover:not(.active) {
        background-color: #111;
    }
    
    .active {
        background-color: #04AA6D;
    }
</style>
<body>

    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li style="float:right"><a class="active" href="#about">About</a></li>
    </ul>

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
