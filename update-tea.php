<?php
include("database.php");

$languages = []; // Initialize the languages array to avoid undefined variable error

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM TEA_REG WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['fname'];
        $lname = $row['lname'];
        $gender = $row['gender'];
        $category = $row['category'];
        $dob = $row['dob'];
        $email = $row['email'];
        $ph = $row['phone_number'];
        $course = $row['course'];
        $post = $row['post'];
        $edu = $row['education'];
        $languages = explode(",", $row['languages']);
        $folder = $row['photo'];
    } else {
        echo "Record not found.";
        exit();
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $category = $_POST['category'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $ph = $_POST['phone_number'];
    $course = $_POST['course'];
    $post = $_POST['post'];
    $edu = $_POST['education'];
    $lang = $_POST['languages'];
    $lang1 = implode(",", $lang);

    // Handling file upload
    if ($_FILES["uploadfile"]["name"] != "") {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/" . $filename;
        move_uploaded_file($tempname, $folder);
    } else {
        // If no new file is uploaded, keep the existing one
        $folder = $_POST['existing_image'];
    }

    // Update query
    $update_qry = "UPDATE TEA_REG SET 
        fname = '$fname',
        lname = '$lname',
        gender = '$gender',
        category = '$category',
        dob = '$dob',
        email = '$email',
        phone_number = '$ph',
        course = '$course',
        post = '$post',
        education = '$edu',
        languages = '$lang1',
        photo = '$folder'
        WHERE id = '$id'";

    $result = mysqli_query($conn, $update_qry);

    if ($result) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<meta http-equiv='refresh' content='0; url=user-index.php'>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher Registration</title>
    <link rel="stylesheet" href="tea-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="./script.js" type="text/javascript"></script>
</head>

<body>
    <div class="wrapper">
        <div class="title">Update Teacher Registration</div>
        <form action="update-tea.php" method="POST" enctype="multipart/form-data">
            <div class="form">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="inputfield">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" placeholder="Enter first name" value="<?php echo isset($fname) ? $fname : ''; ?>" maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>

                <div class="inputfield">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" placeholder="Enter last name" value="<?php echo isset($lname) ? $lname : ''; ?>" maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>

                <div class="inputfield" id="gender">
                    <label>Gender</label>
                    <input type="radio" name="gender" value="Male" <?php echo (isset($gender) && $gender == 'Male') ? 'checked' : ''; ?>> Male
                    <input type="radio" name="gender" value="Female" <?php echo (isset($gender) && $gender == 'Female') ? 'checked' : ''; ?>> Female
                </div>

                <div class="inputfield" id="category">
                    <label>Category</label>
                    <input type="radio" name="category" value="general" <?php echo (isset($category) && $category == 'general') ? 'checked' : ''; ?>> General
                    <input type="radio" name="category" value="sc" <?php echo (isset($category) && $category == 'sc') ? 'checked' : ''; ?>> SC
                    <input type="radio" name="category" value="st" <?php echo (isset($category) && $category == 'st') ? 'checked' : ''; ?>> ST
                    <input type="radio" name="category" value="obc" <?php echo (isset($category) && $category == 'obc') ? 'checked' : ''; ?>> OBC
                </div>

                <div class="inputfield">
                    <label>Date of Birth</label>
                    <input type="date" class="input" name="dob" value="<?php echo isset($dob) ? $dob : ''; ?>" required>
                </div>

                <div class="inputfield">
                    <label>Email Address</label>
                    <input type="email" class="input" name="email" placeholder="Enter your email" value="<?php echo isset($email) ? $email : ''; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required>
                </div>

                <div class="inputfield">
                    <label>Phone Number</label>
                    <input type="text" class="input" name="phone_number" placeholder="Enter your phone number" value="<?php echo isset($ph) ? $ph : ''; ?>" maxlength="10" pattern="[7-9]{1}[0-9]{9}" title="Please enter valid phone number" required>
                </div>

                <div class="inputfield">
                    <label>Department (Subject)</label>
                    <div class="custom_select">
                        <select name="course" required>
                            <option value="">--Select your subject--</option>
                            <option value="Botany" <?php echo (isset($course) && $course == 'Botany') ? 'selected' : ''; ?>>Botany</option>
                            <option value="Chemistry" <?php echo (isset($course) && $course == 'Chemistry') ? 'selected' : ''; ?>>Chemistry</option>
                            <option value="Computer Science" <?php echo (isset($course) && $course == 'Computer Science') ? 'selected' : ''; ?>>Computer Science</option>
                            <option value="Mathematics" <?php echo (isset($course) && $course == 'Mathematics') ? 'selected' : ''; ?>>Mathematics</option>
                            <option value="zoology" <?php echo (isset($course) && $course == 'zoology') ? 'selected' : ''; ?>>Zoology</option>
                        </select>
                    </div>
                </div>

                <div class="inputfield">
                    <label>Designation</label>
                    <div class="custom_select">
                        <select name="post" required>
                            <option value="">--Select--</option>
                            <option value="Professor" <?php echo (isset($post) && $post == 'Professor') ? 'selected' : ''; ?>>Professor (HOD)</option>
                            <option value="Assistant Professor" <?php echo (isset($post) && $post == 'Assistant Professor') ? 'selected' : ''; ?>>Assistant Professor</option>
                            <option value="Associate Professor" <?php echo (isset($post) && $post == 'Associate Professor') ? 'selected' : ''; ?>>Associate Professor</option>
                        </select>
                    </div>
                </div>

                <div class="inputfield">
                    <label>Education Qualification</label>
                    <textarea class="textarea" name="education" placeholder="Enter education details" maxlength="100" required><?php echo isset($edu) ? $edu : ''; ?></textarea>
                </div>

                <div class="inputfield">
                    <label>Upload Photo</label>
                    <p id="file-size">*Max size 100kb.</p>
                    <input type="file" name="uploadfile">
                    <?php if (isset($folder) && $folder != ""): ?>
                        <p>Current Photo: <img src="<?php echo $folder; ?>" width="100"></p>
                        <input type="hidden" name="existing_image" value="<?php echo $folder; ?>">
                    <?php endif; ?>
                </div>

                <div class="inputfield">
                    <label for="languages">Languages Known:</label><br>
                    <input type="checkbox" id="english" name="languages[]" value="English" <?php echo in_array('English', $languages) ? 'checked' : ''; ?>>
                    <label for="english">English</label><br>
                    <input type="checkbox" id="hindi" name="languages[]" value="Hindi" <?php echo in_array('Hindi', $languages) ? 'checked' : ''; ?>>
                    <label for="hindi">Hindi</label><br>
                    <input type="checkbox" id="bengali" name="languages[]" value="Bengali" <?php echo in_array('Bengali', $languages) ? 'checked' : ''; ?>>
                    <label for="bengali">Bengali</label><br>
                    <input type="checkbox" id="nepali" name="languages[]" value="Nepali" <?php echo in_array('Nepali', $languages) ? 'checked' : ''; ?>>
                    <label for="nepali">Nepali</label><br>
                </div>

                <div class="inputfield terms">
                    <label class="check">
                        <input type="checkbox" name="check" value="Declared" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>I hereby declare that the above information provided is true and correct.</p>
                </div>

                <div class="inputfield btns" id="btn">
                    <button type="submit" value="Update" name="update" class="btn">Update</button>
                    <button type="reset" value="Reset" class="btn">Reset</button>
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
        </form>
    </div>
</body>

</html>
