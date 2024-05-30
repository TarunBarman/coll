<?php

include("database.php");
session_start();

// Fetch student data if 'id' is provided in the GET request
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM STD_REG WHERE id = '$id'";
    $data = mysqli_query($conn, $query);

    if (mysqli_num_rows($data) > 0) {
        $result = mysqli_fetch_assoc($data);
    } else {
        echo "No student found with the given ID.";
        exit;
    }
} else {
    echo "No student ID provided.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student update</title>
    <link rel="stylesheet" href="std-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="./script.js" type="text/javascript"></script>
</head>

<body>

    <?php
// error_reporting(5);
    if (isset($_POST['update'])) {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/" . $filename;
        move_uploaded_file($tempname, $folder);

        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $fathername = $_POST['fathername'];
        $gender = $_POST['gender'];
        $category = $_POST['category'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $ph = $_POST['ph'];
        $course = $_POST['course'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $pin = $_POST['pin'];
        
        

        // $update_query = "UPDATE STD_REG SET fname='$fname', lname='$lname', fathername='$fathername', gender='$gender', category='$category', dob='$dob', email='$email', ph='$ph', course='$course', address='$address', state='$state', pin='$pincode' WHERE id='$id'";
        $update_query = "UPDATE STD_REG SET fname='$fname', lname='$lname', fathername='$fathername', gender='$gender', category='$category', dob='$dob', email='$email', ph='$ph', course='$course', address='$address', state='$state', pin='$pin' WHERE id='$id'";

        $result = mysqli_query($conn, $update_query);

        if ($result) {
            echo "<script> alert('Student details updated successfully. Registration Number: .$id') </script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/coll/display-std.php' />";
        } else {
            echo "Error updating student details: " . mysqli_error($conn); // Print SQL error message
        }
        // else {
        //     echo "Error updating student details.";
        // }
    }

    ?>

    <div class="wrapper">
        <div class="title"> Update Student Details
        </div>
        <form action="update-std.php?id=<?php echo $result['id']; ?>" enctype="multipart/form-data" method="post">
            <div class="form">

                <div class="inputfield">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" value="<?php echo $result['fname']; ?>" placeholder="Enter first name" maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>

                <div class="inputfield">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" value="<?php echo $result['lname']; ?>" placeholder="Enter last name" maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>

                <div class="inputfield">
                    <label>Father Name</label>
                    <input type="text" class="input" name="fathername" value="<?php echo $result['fathername']; ?>" placeholder="Enter Father name" maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>

                <div class="inputfield" id="gender">
                    <label for="">Gender</label>
                    <input type="radio" name="gender" value="Male" <?php if ($result['gender'] == 'Male') echo 'checked'; ?>><label>Male</label>
                    <input type="radio" name="gender" value="Female" <?php if ($result['gender'] == 'Female') echo 'checked'; ?>><label>Female</label>
                </div>

                <div class="inputfield">
                    <label>Category</label>
                    <div class="custom_select">
                        <select name="category" required>
                            <option value="">--Select your category--</option>
                            <option value="genaral" <?php if ($result['category'] == 'genaral') echo "selected"; ?>>Genaral</option>
                            <option value="sc" <?php if ($result['category'] == 'sc') echo "selected"; ?>>SC</option>
                            <option value="st" <?php if ($result['category'] == 'st') echo "selected"; ?>>ST</option>
                            <option value="obc" <?php if ($result['category'] == 'obc') echo "selected"; ?>>OBC</option>
                        </select>
                    </div>
                </div>

                <div class="inputfield">
                    <label for="">Date of Birth</label>
                    <input type="date" class="input" name="dob" value="<?php echo $result['dob']; ?>" required>
                </div>

                <div class="inputfield">
                    <label>Email Address</label>
                    <input type="email" class="input" name="email" value="<?php echo $result['email']; ?>" placeholder="Enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required>
                </div>

                <div class="inputfield">
                    <label for="">Phone Number</label>
                    <div class="custom-select" id="phone-codes">
                        <select id="phone-code">
                            <option value="+91">+91</option>
                        </select>
                    </div>
                    <input type="tel" class="input" name="ph" value="<?php echo $result['ph']; ?>" maxlength="10" placeholder="Enter your phone number" pattern="[7-9]{1}[0-9]{9}" title="Please enter valid phone number" required>
                </div>

                <div class="inputfield">
                    <label>Course</label>
                    <div class="custom_select">
                        <select name="course" required>
                            <option value="">--Select your Course--</option>
                            <option value="Botany" <?php if ($result['course'] == 'Botany') echo "selected"; ?>>Botany</option>
                            <option value="Chemistry" <?php if ($result['course'] == 'Chemistry') echo "selected"; ?>>Chemistry</option>
                            <option value="Computer Science" <?php if ($result['course'] == 'Computer Science') echo "selected"; ?>>Computer Science</option>
                            <option value="Mathematics" <?php if ($result['course'] == 'Mathematics') echo "selected"; ?>>Mathematics</option>
                            <option value="zoology" <?php if ($result['course'] == 'zoology') echo "selected"; ?>>Zoology</option>
                        </select>
                    </div>
                </div>

                <div class="inputfield">
                    <label>Address</label>
                    <textarea class="textarea" name="address" placeholder="Enter your address" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" maxlength="100" required><?php echo $result['address']; ?></textarea>
                </div>

                <div class="inputfield">
                    <label>State</label>
                    <div class="custom_select">
                        <select name="state" required>
                            <option value="">--Select your state--</option>
                            <?php
            // Loop through an array of states to generate the options dynamically
            $states = array(
                "Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar",
                "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli", "Daman and Diu", "Delhi",
                "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand",
                "Karnataka", "Kerala", "Ladakh", "Lakshadweep", "Madhya Pradesh", "Maharashtra",
                "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab",
                "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh",
                "Uttarakhand", "West Bengal"
            );

            foreach ($states as $state) {
                // Check if the current state matches the one in the database, and mark it as selected if so
                $selected = ($state === $result['state']) ? 'selected' : '';
                echo "<option value='$state' $selected>$state</option>";
            }
            ?>
                        </select>
                    </div>
                </div>

                <div class="inputfield">
                    <label>Pin Code</label>
                    <input type="text" class="input" name="pincode" value="<?php echo $result['pin']; ?>" placeholder="Enter your pin code" pattern="[0-9]{6}" title="Enter valid pin code" required>
                </div>

                <div class="inputfield">
                    <label>Upload Image</label>
                    <input type="file" name="uploadfile" >
                </div>

                <div class="inputfield">
                    <input type="submit" name="update" value="Update" class="btn">
                    
                </div>

            </div>
        </form>
    </div>

</body>

</html>
