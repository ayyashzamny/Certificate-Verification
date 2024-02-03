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
    <title>Registration Form</title>
</head>
<body>
    <div class="registration-container">
        <div class="form-container">
            <h1>Add new Certificate</h1>
            <form method="post" action="AddnewCer.php">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" required>

                <label for="course">Course:</label>
                <input type="text" id="course" name="course" required>

                <label for="certificateID">Certificate ID:</label>
                <input type="text" id="certificateID" name="certificateID" required>

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
