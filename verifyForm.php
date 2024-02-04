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
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                    margin: 0;
                    background-color: #f4f4f4;
                }

                .details-container {
                    max-width: 400px;
                    padding: 0 20px;
                    border: 2px solid #4CAF50;
                    border-radius: 10px;
                    background-color: #d2f4d2;
                    text-align: left;
                    font-size: 20px;
                    margin-bottom: 20px;
                }

                .btc {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                }

                .back-to-checking {
                    padding: 10px 20px;
                    background-color: #4CAF50;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    font-weight: bold;
                }

                .details {
                    text-align: center;
                }
            </style>
            <title>Details Page</title>
        </head>
        <body>
            <div class="details-container">
                <h2 class="details">Verified</h2>
                <p><strong>Name:</strong> <?php echo $certificateDetails["full_name"];?></p>
                <p><strong>Course:</strong> <?php echo $certificateDetails["course"];?></p>
                <p><strong>Issued Date:</strong> <?php echo $certificateDetails["created_at"];?></p>
                <p><strong>Certificate ID:</strong> <?php echo $certificateDetails["certificate_id"];?></p>
            </div>
            <div class="btc">
                <a href="VerifyHome2.php" class="back-to-checking">Back to Checking</a>
            </div>
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
