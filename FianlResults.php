<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $cerID = $_POST["cerID"];

    // SQL query to check if the certificate ID exists in the database
    $query = "SELECT * FROM certificates WHERE CerID = '$cerID'";
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

    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Verified</title>
</head>
<body>

    <img src="img/tti_logo.jpg" alt="logo" class="logo">
    <h2 class="title">Telecom Training Institute</h2>
    
    <ul class="navbar">
      <li><a href="index.html">Home</a></li>
      <li><a href="Courses.html">Courses</a></li>
      <li><a href="contectus.html">Conatact us</a></li>
      <li><a class="active" href="VerifyHome2.php">Back to Verification</a></li>
    </ul>

    
    <fieldset class="verifyall">
      <div class="row">
        <div class="column1">
          <h1 class="verify-title">Verified</h1>
          <p><strong>Name:</strong> <?php echo $certificateDetails["Name"];?></p>
          <p><strong>Course:</strong> <?php echo $certificateDetails["Course"];?></p>
          <p><strong>NIC:</strong> <?php echo $certificateDetails["NIC"];?></p>
          <p><strong>Certificate ID:</strong> <?php echo $certificateDetails["CerID"];?> </p>
          <p><strong>Serial No:</strong> <?php echo $certificateDetails["SerialNo"];?></p>
          <p><strong>Issued Date :</strong> <?php echo $certificateDetails["Date"];?></p>
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