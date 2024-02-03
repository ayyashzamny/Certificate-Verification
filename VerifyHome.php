<?php
        session_start();
        
        // Check for an error message
        if(isset($_SESSION['error_message'])) {
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
    <link rel="stylesheet" href="Style/VerifyHome.css">
    <title>Verification Page</title>
</head>
<body>

    
    <div class="Car-container">
        <div class="logo-container">
            <img src="img/verify.jpg" alt="Logo">
        </div>

        <div class="form-container">
            <h1>Verify Certificates</h1>
            <form method="post" action="verifyForm.php">

                <label for="cerID">Certificate ID:</label>
                <input type="text" id="cerID" name="cerID" placeholder="eg : 789PQR456XYZ" required>
                <br><br>
                <button type="submit" class="verify-btn">Verify</button>
                <button type="reset" class="clear-btn">Clear</button>
            </form>     
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var overlay = document.getElementById('Eoverlay');
            if (overlay) {
                setTimeout(function() {
                    overlay.style.display = 'none';
                }, 3000); 
            }
        });
    </script>
</body>
</html>
