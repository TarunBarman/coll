<?php
include("database.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login-style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <div class="Form login-form">
            <h2>Login</h2>
            <form action="login.php" method="POST" autocomplete="off">
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <label for="#">Username</label>
                    <input type="text" name="username" class="textfiled" placeholder="Enter Your Username*" required>


                </div>
                <div class="input-box">
                    <i class='bx bxs-key'></i>
                    <input type="password" name="password" class="textfiled" placeholder="Enter Your Password*" required>
                    <label for="#">Password</label>

                </div>
                <div class="input-box">
                    <i class='bx bxs-user-detail'></i>
                    <label for="usertype">User Type</label>
                    <select name="user_type" class="textfiled" required>
                        <option value="" style="color: rgb(255, 255, 255);">Select User Type</option>
                        <option value="Admin" style="color: rgb(87, 87, 87);">Admin</option>
                        <option value="User" style="color: rgb(97, 97, 97);">User</option>
                    </select>
                </div>
                <div class="forgot-section">
                    <span><input type="checkbox" name="checkbox" id="checked" required>Remember Me</span>
                    <span><a href="#" onclick="message()">Forgot Password ?</a></span>
                </div>



                <button type="submit" class="btn" name="login" value="login">
                    <!-- <a href="user-index.php" style="text-decoration: none;"> -->
                    Login</a>
                </button>

            </form>


            <p class="RegisteBtn RegiBtn"><a href="register-page.php">Register Now</a></p>
        </div>

        <script>
            function message() {
                alert("yad karke rakho yar!");
            }

        </script>
</body>

</html>
<?php
include("database.php");

error_reporting(5);
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $user_type = $_POST['user_type'];


    $query = "SELECT * FROM register_all WHERE email = '$username' && password = '$pwd' && user_type = '$user_type'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    //  echo $total;
   // $result = mysqli_fetch_assoc($data);
   if($user_type == 'Admin') {
    header('Location: admin-page.php');
    exit();
} elseif($user_type == 'User') {
    header('Location: user-index.php');
    exit();
}

   if($total == 1)
   {
    // echo "<script> alert('Successfully login') </script>";

    $_SESSION['user_name'] = $username;
    // header('location:admin-page.php');
    ?>
    <meta http-equiv = "refresh" content = "0.3; url = http://localhost/coll/user-index.php" />
    <?php
   }
   else{
    echo "<script> alert('login failed') </script>";
    
   }


}



?>
