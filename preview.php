<?php
include("database.php");
session_start();

// if (!isset($_SESSION['id'])) {
//   $_SESSION['id'] = id; // Replace 1 with an actual student ID from your database.
// }
// For testing purposes, you can set the session ID manually.
// In a real application, you would set this upon user login or some other appropriate event.
// $_SESSION['id'] = 1; // Uncomment and set the correct student ID for testing.

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Preview</title>
    <link rel="stylesheet" href="std-style.css">
    <style>
        .preview-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .preview img {
            display: block;
            margin: auto;
        }
        .preview p {
            font-size: 16px;
            margin: 5px 0;
        }
        .btn-print {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_SESSION['id'])) {
        $id = $_SEESION['id'];

        $query = "SELECT * FROM std_reg WHERE id='$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                ?>

                <div class="preview-container">
                    <h2>Student Details</h2>
                    <div class="preview">
                        <img src="<?php echo $row['image']; ?>" alt="Student Image" width="150" height="150">
                        <p><strong>First Name:</strong> <?php echo $row['fname']; ?></p>
                        <p><strong>Last Name:</strong> <?php echo $row['lname']; ?></p>
                        <p><strong>Father's Name:</strong> <?php echo $row['fathername']; ?></p>
                        <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
                        <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
                        <p><strong>Date of Birth:</strong> <?php echo $row['dob']; ?></p>
                        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                        <p><strong>Phone Number:</strong> <?php echo $row['phone_number']; ?></p>
                        <p><strong>Course:</strong> <?php echo $row['course']; ?></p>
                        <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
                        <p><strong>State:</strong> <?php echo $row['state']; ?></p>
                        <p><strong>Pincode:</strong> <?php echo $row['pincode']; ?></p>
                    </div>
                    <button class="btn-print" onclick="window.print()">Print</button>
                </div>

                <?php
            } else {
                echo "<p>No student found with the given ID.</p>";
            }
        } else {
            echo "<p>Error fetching student details.</p>";
        }
    } else {
        echo "<p>Student ID is not set in the session.</p>";
    }
    ?>

</body>

</html>
