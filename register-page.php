<?php
include("database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login-style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>


<?php
     if(isset($_POST['register']))
     {
        // $id = $_POST['id'];
        $fname = $_POST['full_name'];
        $email = $_POST['email'];
        $pwd   = $_POST['password'];
        $cpwd  = $_POST['confirm_password'];
        $user_type = $_POST['user_type'];

        if($fname != "" &&  $email != "" && $pwd != "" && $cpwd != "")

        $query =  "INSERT INTO register_all values('$id','$fname', '$email', '$pwd','$cpwd', '$user_type')";
        $data = mysqli_query($conn,$query);

        if($data)
        {
            echo "<script> alert ('Data inserted Succecfully') </script>";
            // header('location:login.php');
            ?>

            <meta http-equiv = "refresh" content = "0; url = http://localhost/coll/login.php"/>
        
        
            <?php
           
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

    <div class="container">
        <div class="Form login-form">
            <h2>Register</h2>
            <form action="#" method="POST" autocomplete="off">
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <input type="text" id="FName" placeholder="Enter First Name..." name="full_name" required>
                    <label for="#">Full Name</label>
                </div>
                <div class="input-box">
                    <i class='bx bxs-envelope'></i>
                    <label for="#">Email</label>
                    <input type="email" class="input" name="email" placeholder="Enter your email*"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required>


                </div>
                <div class="input-box">
                    <i class='bx bxs-lock'></i>
                    <input type="password" name="password" class="textfiled" placeholder="Enter Your Password*" required>
                    <label for="#">Password</label>

                </div>
                <div class="input-box">
                    <i class='bx bxs-key'></i>
                    <input type="password" name="confirm_password" class="textfiled" placeholder="Enter Your Password*" required>
                    <label for="#">Confirm Password</label>

                </div>
                <div class="input-box">
                    <i class='bx bxs-user-detail'></i>
                    <label for="usertype">User Type</label>
                    <select name="user_type" class="textfiled" required>
                        <option value="" style="color: rgb(255, 255, 255);">Select User Type*</option>
                        <option value="Admin" style="color: rgb(87, 87, 87);">Admin</option>
                        <option value="User" style="color: rgb(97, 97, 97);">User</option>
                    </select>
                </div>
                <div class="forgot-section">
                    <span><input type="checkbox" name="" id="checked" required>Remember Me</span>
                    <!-- <span><a href="#" onclick="message()">Forgot Password ?</a></span> -->
                </div>



                <button type="submit" class="btn" name="register" value="register">
                    <!-- <a href="#" style="text-decoration: none;"> -->
                    Register</a>
                </button>
               
            </form>


            <!-- <p class="RegisteBtn RegiBtn"><a href="#">Register Now</a></p> -->
        </div>
       
</body>

</html>
