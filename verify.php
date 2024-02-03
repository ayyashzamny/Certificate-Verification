<?php
	require 'db_connection.php';
    session_start();
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
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .details-container {
            max-width: 400px;
            padding: 20px;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            background-color: #d2f4d2;
            text-align: left;
        }

        .details{
            text-align: center;
        }
    </style>
    <title>Details Page</title>
</head>
<body>
    <?php
        session_start();
        $rows = mysqli_query($conn, "SELECT * FROM certificates WHERE certificate_id = {$_SESSION['certificate_id']}");
        foreach ($rows as $row) :
    ?>

    <div class="details-container">
        <h2 class="details">Details</h2>
        <p><strong>Name:</strong> <?php echo $row["full_name"];?></p>
        <p><strong>Course:</strong> <?php echo $row["course"];?></p>
        <p><strong>Issued Date:</strong> <?php echo $row["created_at"];?></p>
        <p><strong>Certificate ID:</strong> <?php echo $row["certificate_id"];?></p>
    </div>

    <?php endforeach; ?>

</body>
</html>
