<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $cerID = $_POST["cerID"];

    // SQL query to check if the certificate ID exists in the database
    $query = "SELECT * FROM certificates WHERE certificate_id = '$cerID'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Certificate ID exists, fetch and display details
        $certificateDetails = mysqli_fetch_assoc($result);
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/HeaderFooter.css">
    <link rel="stylesheet" href="Style/test.css">
    <title>Home</title>
</head>
<body>

    <img src="img/tti_logo.jpg" alt="logo" class="logo">
    <h2 class="title">Telecom Training Institute</h2>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="Courses.html"  >Courses</a></li>
        <li><a href="verifyHome2.php" class="active">Back to Verification</a></li>
    </ul>

    
    <fieldset class="verifyall">
      <div class="row">
        <div class="column1">
          <h1 class="verify-title">Verified</h1>
          <p><strong>Name:</strong> <?php echo $certificateDetails["full_name"];?></p>
          <p><strong>Course:</strong><?php echo $certificateDetails["course"];?></p>
          <p><strong>NIC:</strong> <?php echo $certificateDetails["created_at"];?></p>
          <p><strong>Certificate ID:</strong><?php echo $certificateDetails["certificate_id"];?> </p>
          <p><strong>Serial No:</strong> </p>
          <p><strong>Issued Date :</strong> </p>
        </div>
        <div class="column2">
          <div class="things">
            <img src="img/Certified.jpg" alt="Certified" class="Certified">
             
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
</body>
</html>

<?php
    } else {
        // Certificate ID not found, show error message
        $_SESSION['error_message'] = "Certificate ID not found. Please check the ID and try again.";
        header("location: VerifyHome2.php");
        exit();
    }
}

// Close the database connection
mysqli_close($connection);
?>