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
    <link rel="stylesheet" href="Style/HeaderFooter.css">
    <link rel="stylesheet" href="Style/verifyHomeStyle.css">
    <title>Verification Page</title>
</head>
<body>

    <img src="img/tti_logo.jpg" alt="logo" class="logo">
    <h2 class="title">Telecom Training Institute</h2>
    <ul class="navbar">
      <li><a href="index.html">Home</a></li>
      <li><a href="Courses.html">Courses</a></li>
      <li><a class="active" href="VerifyHome2.php">Certificate Verification</a></li>
    </ul>

    

    <fieldset class="verifyall">
      <div class="row">
        <div class="column1">
          <img src="img/verify.jpg" alt="Snow" style="width:100%" class="logoForm">
        </div>
        <div class="column2">
          <div class="things">
            <h1 class="verify-title">Verify Certificate</h1>
            <form method="post" action="FianlResults.php">
                <label for="cerID">Certificate ID:</label>
                <input type="text" id="cerID" name="cerID" placeholder="eg : 789PQR456XYZ" required>
                <br><br>
                <button type="submit" class="verify-btn">Verify</button>
                <button type="reset" class="clear-btn">Clear</button>
            </form> 
        </div>
      </div>
          
      </div>
    </fieldset>



      <div class="footer">
        <div class="links">
          <h3>Quick Links</h3>
          <p>Home</p>
          <p>Courses</p>
          <p>Verification</p>
        </div>
        
        <img src="img/tti_logoFooter.jpg" alt="Footer_Logo" class="Footer-logo">
        
      </div>
      <p class="copyright">Developed and Designed by <a href="https://ayyashzamny.github.io/portfolio/" class="mylink">Ayyash Zamny</a></p>

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