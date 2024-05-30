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


// $insert_qry = " SELECT *  FROM std_reg where id='$id'";
// $query = " SELECT * FROM STD_REG WHERE id='$id'";

// $data = mysqli_query($conn,$query);
// $total = mysqli_num_rows($data);
// // $result =mysqli_fetch_array($data);
// $result = mysqli_fetch_assoc($data);
// <!-- echo $_GET['id']; -->
// echo $_GET['fn'];
// echo $_GET['ln'];
// echo $_GET['si'];
// echo $_GET['ftn'];
// echo $_GET['gen'];
// echo $_GET['cat'];
// echo $_GET['dob'];
// echo $_GET['em'];
// echo $_GET['ph'];
// echo $_GET['course'];
// echo $_GET['add'];
// echo $_GET['st'];
// echo $_GET['pin'];
// echo $_GET['photo'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Details</title>
    <link rel="stylesheet" href="std-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="./script.js" type="text/javascript"></script>
</head>

<body>


    <?php
// error_reporting(0);

     if(isset($_POST['update']))
     
     
     
     {
    
        $id         = $_POST['id'];
        $fname      = $_POST['fname'];
        $lname      = $_POST['lname'];
        $student_id = $_POST['student_id'];
        $fathername = $_POST['fathername'];
        $gender     = $_POST['gender'];
        $category   = $_POST['category'];
        $dob        = $_POST['dob'];
        $email      = $_POST['email'];
        $ph         = $_POST['ph'];
        $course     = $_POST['course'];
        $address    = $_POST['address'];
        $state      = $_POST['state'];
        $pin    = $_POST['pin'];
        $file       = $_POST['myfile'];


    
    // $query =  "INSERT INTO register_all values('$id','$fname', '$email', '$pwd','$cpwd', '$user_type')";
   
                 
    $query = "UPDATE STD_REG set fname='$fname', lname='$lname', fathername='$fathername', gender='$gender', category='$category', dob='$dob', email='$email', ph='$ph', course='$course', address='$address', state='$state', pin='$pin' WHERE id='$id'";
    $data = mysqli_query($conn,$query);

    if($data)
    {
        echo "<script> alert ('Data inserted Succecfully') </script>";
        header('location:display-std.php');
        // 

        // <!-- <meta http-equiv = "refresh" content = "0; url = http://localhost/coll/login.php"/> -->
    
    
        // 
       
    }
    else
    {
        echo "failed";
    }
}
else{
    // echo "Please fill the field";

}
  

?>
    <div class="wrapper">
        <div class="title"> Update Student Details
        </div>
        <!-- <form action="update-std.php?id=95 method="post" enctype="multipart/form-data"> -->

        <form action="update-std.php?id=<?php echo $result['id']; ?>" data-netlify="true" method="post">
            <div class="form">

                <div class="inputfield">
                    <label>First Name</label>
                    <input type="text" class="input" id="name" value="<?php echo $result['fname'];?>"  name="fname" placeholder="Enter first name"
                        maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>

                <div class="inputfield">
                    <label>Last Name</label>
                    <input type="text" class="input" id="name" value="<?php echo $result['lname'];?>" name="lname" placeholder="Enter last name" maxlength="30"
                        pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>
              
                <div class="inputfield">
                    <label>Father Name</label>
                    <input type="text" class="input" id="name" value="<?php echo $result['fathername'];?>" name="fathername" placeholder="Enter Father name"
                        maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>
                <div class="inputfield" id="gender">
                    <label for="">Gender</label>
                    <input type="radio" name="gender" id="radio" value="Male"
                    <?php
                        if ($result['gender'] == 'Male')
                        {
                            echo 'checked';
                        }                   
                    ?>

                    ><label>Male</label>
                    <input type="radio" name="gender" id="radio" value="Female" 
                    <?php
                        if ($result['gender'] == 'Female')
                        {
                            echo 'checked';
                        }                   
                    ?>

                    ><label>Female</label>
                </div>

                               
                <div class="inputfield">
                    <label>category</label>
                    <div class="custom_select">
                        <select id="category" name="category" required>
                            <option value="">--Select your category--</option>
                            <option value="genaral"
                            <?php 
                                if($result['category'] == 'genaral')
                                {
                                    echo "selected";
                                }
                          ?>  
                            >Genaral</option>
                            <option value="sc"
                            <?php 
                                if($result['category'] == 'sc')
                                {
                                    echo "selected";
                                }
                          ?> 
                            >SC</option>
                            <option value="st"
                            <?php 
                                if($result['category'] == 'st')
                                {
                                    echo "selected";
                                }
                          ?> 
                            >ST</option>
                            <option value="obc"
                            <?php 
                                if($result['category'] == 'obc')
                                {
                                    echo "selected";
                                }
                          ?> 
                            >OBC</option>
                         </select>
                     </div>
                </div>
 
                <div class=" inputfield">
                    <label for="">Date of Birth</label>
                    <input type="date" class="input" value="<?php echo $result['dob'];?>" name="dob" required>
                </div>

                <div class="inputfield">
                    <label>Email Address</label>
                    <input type="email" class="input" value="<?php echo $result['email'];?>" name="email" placeholder="Enter your email"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required>
                </div>



                <p id="message"></p>

                <div class="inputfield">
                    <label for="">Phone Number</label>
                    <div class="custom-select"  id="phone-codes">
                        <select id="phone-code">
                            <option value="+91">+91</option>
                        </select>
                    </div>
                    <input type="tel" class="input" value="<?php echo $result['ph'];?>" name="ph" maxlength="10" id="ph"
                        placeholder="Enter your phone number" pattern="[7-9]{1}[0-9]{9}"
                        title="Please enter valid phone number">
                </div>
                <div class="inputfield">
                    <label>Course</label>
                    <div class="custom_select">
                        <select id="state" name="course" required>
                            <option value="">--Select your Course--</option>
                            <option value="Botany"
                            <?php 
                                if($result['course'] == 'Botany')
                                {
                                    echo "selected";
                                }
                          ?> 
                            >Botany</option>
                            <option value="Chemistry"
                            <?php 
                                if($result['course'] == 'Chemistry')
                                {
                                    echo "selected";
                                }
                          ?> 
                            >Chemistry</option>
                            <option value="Computer Science"
                            <?php 
                                if($result['course'] == 'Computer Science')
                                {
                                    echo "selected";
                                }
                          ?> 
                            >Computer Science</option>
                            <option value="Mathematics"
                            <?php 
                                if($result['course'] == 'Mathematics')
                                {
                                    echo "selected";
                                }
                          ?> 
                            >Mathematics</option>
                            <option value="zoology"
                            <?php 
                                if($result['course'] == 'zoology')
                                {
                                    echo "selected";
                                }
                          ?> 
                            >Zoology</option>
                        </select>
                    </div>
                </div>

                <div class="inputfield">
                    <label>Address</label>
                    <textarea class="textarea" name="address" id="" cols="30" rows="5" placeholder="Enter your address"
                        pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" maxlength="100" required><?php echo $result['address'];?></textarea>
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
                    <input type="text" class="input" value="<?php echo $result['pin'];?>" name="pincode" placeholder="Enter your pin code" maxlength="6"
                        pattern="^[0-9]{6}$" required>
                </div>

                <!-- <div class="inputfield">
                    <label>Upload Photo</label>
                    <p id="file-size">*Max size 100kb.</p>
                    <input type="file" name="myfile"value="" id="myfile" placeholder="Upload your photo" rows="7" required />

                </div> -->
                <div class="inputfield">
                    <label>Upload Image</label>
                    <p id="file-size">*Max size 100kb.</p>
                    <input type="file" name="uploadfile" id="" >
                    
                </div>

                <div class="inputfield terms">
                    <label class="check">
                        <input type="checkbox" name="check" value="Declared" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>I hereby declare that the above information provided is true and correct.</p>
                </div>

                <div class="inputfield" required>
                    <div data-netlify-recaptcha="true"></div>
                </div>

                <div class="inputfield btns" id="btn">
                    <button type="submit" value="update" name="update" class="btn"
                        onclick="checkPassword()">Update</button>
                    <button type="reset" value="Reset" class="btn">Reset</button>
                </div>

            </div>
        </form>
    </div>

</body>

</html>