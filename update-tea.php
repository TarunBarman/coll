
<?php
include("database.php");
session_start();
error_reporting(0);
// Fetch teacher data if 'id' is provided in the GET request
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM teacher_reg WHERE id = '$id'";
    $data = mysqli_query($conn, $query);

    if (mysqli_num_rows($data) > 0) {
        $result = mysqli_fetch_assoc($data);
    } else {
        echo "No teacher found with the given ID.";
        exit;
    }
} else {
    echo "No teacher ID provided.";
    exit;
}

if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $gender     = $_POST['gender'];
    $category   = $_POST['category'];
    $dob        = $_POST['dob'];
    $email      = $_POST['email'];
    $ph         = $_POST['ph'];
    $course     = $_POST['course'];
    $post       = $_POST['post'];
    $edu        = $_POST['education'];
    $languages  = isset($_POST['languages']) ? implode(', ', $_POST['languages']) : ''; // Convert array to comma-separated string
    $file       = $_FILES['uploadfile'];

    // Initialize file upload variables
    $uploadOk = 1;
    $target_file = "";

    // Handle file upload if a file is provided
    if ($file['size'] > 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file size
        if ($file["size"] > 100000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (!move_uploaded_file($file["tmp_name"], $target_file)) {
                echo "Sorry, there was an error uploading your file.";
                $uploadOk = 0;
            }
        }
    }

    if ($uploadOk == 1) {
        if ($file['size'] > 0) {
            $query = "UPDATE teacher_reg SET fname='$fname', lname='$lname', gender='$gender', category='$category', dob='$dob', email='$email', ph='$ph', course='$course', post='$post', edu='$edu', languages='$languages', file='$target_file' WHERE id='$id'";
        } else {
            $query = "UPDATE teacher_reg SET fname='$fname', lname='$lname', gender='$gender', category='$category', dob='$dob', email='$email', ph='$ph', course='$course', post='$post', edu='$edu', languages='$languages' WHERE id='$id'";
        }

        $data = mysqli_query($conn, $query);

        if ($data) {
            echo "<script> alert('Data updated successfully'); </script>";
            echo '<script>window.location.href = "display-tea.php";</script>';
            // header('Location: display-tea.php');
        } else {
            echo "Failed to update data.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher Details</title>
    <link rel="stylesheet" href="reg2-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="./script.js" type="text/javascript"></script>
</head>
<body>
    <div class="wrapper">
        <div class="title">Update Teacher Details</div>
        <form action="update-tea.php?id=<?php echo $result['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="form">
                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

                <div class="inputfield">
                    <label>First Name</label>
                    <input type="text" class="input" id="name" value="<?php echo $result['fname'];?>" name="fname" placeholder="Enter first name" maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>

                <div class="inputfield">
                    <label>Last Name</label>
                    <input type="text" class="input" id="name" value="<?php echo $result['lname'];?>" name="lname" placeholder="Enter last name" maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>

                <div class="inputfield" id="gender">
                    <label for="">Gender</label>
                    <input type="radio" name="gender" id="radio" value="Male" <?php if ($result['gender'] == 'Male') echo 'checked'; ?>>
                    <label>Male</label>
                    <input type="radio" name="gender" id="radio" value="Female" <?php if ($result['gender'] == 'Female') echo 'checked'; ?>>
                    <label>Female</label>
                </div>

                <div class="inputfield">
                    <label>Category</label>
                    <div class="custom_select">
                        <select id="category" name="category" required>
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
                    <input type="date" class="input" value="<?php echo $result['dob'];?>" name="dob" required>
                </div>

                <div class="inputfield">
                    <label>Email Address</label>
                    <input type="email" class="input" value="<?php echo $result['email'];?>" name="email" placeholder="Enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required>
                </div>

                <div class="inputfield">
                    <label for="">Phone Number</label>
                    <div class="custom-select" id="phone-codes">
                        <select id="phone-code">
                            <option value="+91">+91</option>
                        </select>
                    </div>
                    <input type="tel" class="input" value="<?php echo $result['ph'];?>" name="ph" maxlength="10" id="ph" placeholder="Enter your phone number" pattern="[7-9]{1}[0-9]{9}" title="Please enter valid phone number">
                </div>

                <div class="inputfield">
                    <label>Department (Course)</label>
                    <div class="custom_select">
                        <select id="course" name="course" required>
                            <option value="">--Select your Course--</option>
                            <option value="Botany" <?php if ($result['course'] == 'Botany') echo "selected"; ?>>Botany</option>
                            <option value="Chemistry" <?php if ($result['course'] == 'Chemistry') echo "selected"; ?>>Chemistry</option>
                            <option value="Computer Science" <?php if ($result['course'] == 'Computer Science') echo "selected"; ?>>Computer Science</option>
                            <option value="Mathematics" <?php if ($result['course'] == 'Mathematics') echo "selected"; ?>>Mathematics</option>
                            <option value="Zoology" <?php if ($result['course'] == 'Zoology') echo "selected"; ?>>Zoology</option>
                        </select>
                    </div>
                </div>
                <div class="inputfield">
                    <label>Designation</label>
                    <div class="custom_select">
                        <select id="post" name="post" required>
                            <option value="">--Select--</option>
                            <option value="Professor"  <?php if ($result['post'] == 'professor') echo "selected"; ?>>Professor(HOD)</option>
                            <option value=" Assistant Professor" <?php if ($result['post'] == 'Assistant professor') echo "selected"; ?>>Assistant Professor</option>
                            <option value="Associate Professor" <?php if ($result['post'] == 'Associate professor') echo "selected"; ?>>Associate Professor</option>
                        </select>
                    </div>
                </div>

                <div class="inputfield">
                    <label>Education Qualification</label>
                    <textarea class="textarea" name="education" cols="30" rows="5" placeholder="Enter education details" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" maxlength="100" required><?php echo $result['edu'];?></textarea>
                </div>

                <div class="inputfield">
    <label>Languages Known</label><br>
    <input type="checkbox" id="english" name="languages[]" value="english" <?php echo (in_array('english', explode(',', $result['languages']))) ? 'checked' : ''; ?>>
    <label for="english">English</label><br>
    <input type="checkbox" id="hindi" name="languages[]" value="hindi" <?php echo (in_array('hindi', explode(',', $result['languages']))) ? 'checked' : ''; ?>>
    <label for="hindi">Hindi</label><br>
    <input type="checkbox" id="bengali" name="languages[]" value="bengali" <?php echo (in_array('bengali', explode(',', $result['languages']))) ? 'checked' : ''; ?>>
    <label for="bengali">Bengali</label><br>
    <input type="checkbox" id="nepali" name="languages[]" value="nepali" <?php echo (in_array('nepali', explode(',', $result['languages']))) ? 'checked' : ''; ?>>
    <label for="nepali">Nepali</label><br>
</div>


                <div class="inputfield">
                    <label>Upload Image</label>
                    <p id="file-size">*Max size 100kb.</p>
                    <input type="file" name="uploadfile" id="">
                </div>

                <div class="inputfield terms">
                    <label class="check">
                        <input type="checkbox" name="check" value="Declared" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>I hereby declare that the above information provided is true and correct.</p>
                </div>

                <div class="inputfield">
                    <div data-netlify-recaptcha="true"></div>
                </div>

                <div class="inputfield btns" id="btn">
                    <button type="submit" value="update" name="update" class="btn">Update</button>
                    <button type="reset" value="Reset" class="btn">Reset</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
