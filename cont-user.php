<?php
include("database.php");

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="contact-style.css">
    <script src="https://kit.fontawesome.com/aa7454d09f.js" crossorigin="anonymous"></script>

</head>

<body>
<?php
error_reporting(0);
     if(isset($_POST['submit']))
     {
       
        //  $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
      

        // if($name != "" &&  $email != "" && $subject != "" && $message != "" ){

        

        $query =  "INSERT INTO cont_all values('$id','$name', '$email','$subject','$message')";
        $data = mysqli_query($conn,$query);

        if($data)
        {
            echo "<script> alert ('Message send succecfully') </script>";

            ?>

            <meta http-equiv = "refresh" content = "0.1; url = http://localhost/coll/user-index.php" />
        
        
            <?php
    
          
        }
        else
        {
            echo "failed";
        }
    }
//   else{
//         echo "Please fill the field";

//     }
  

?>
 

    <section class="contact-form">

        <h4 class="sectionHeader">contact us</h4>
        <h1 class="heading">Get In Touch!</h1>
        <!-- <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eos
            inventore omnis aliquid rerum alias molestias.</p> -->

        <div class="contactForm">
            <form action="cont-user.php" method="POST">
                <h1 class="sub-heading">Need Support !</h1>
                <p class="para para2">We're open for any suggestion</p>
                <input type="text" name="name" class="input" placeholder="your name" required>
                <input type="text" name="email" class="input" placeholder="your email" required>
                <input type="text" name="subject" class="input" placeholder="subject" required>
                <textarea class="input" name="message" cols="30" rows="5" placeholder="Your message..." required></textarea>
                <input type="submit" name="submit" class="input submit" value="Send Message" required>
            </form>

            <div class="map-container">
                <div class="mapBg"></div>
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d890.8127661686117!2d88.39201265022352!3d26.73636314281488!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e446db6cf135a9%3A0x798384af668b8e57!2sAcharya%20Prafulla%20Chandra%20Roy%20Government%20College!5e0!3m2!1sen!2sin!4v1716450427867!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <div class="contactMethod">
            <div class="method">
                <i class="fa-solid fa-location-dot contactIcon"></i>
                <article class="text">
                    <h1 class="sub-heading">Location</h1>
                    <p class="para">P9JQ+6H9 Himachal Bihar Phase 1, Uttorayon Twp, Matigara, Siliguri, West Bengal 734010
                    </p>
                </article>
            </div>

            <div class="method">
                <i class="fa-solid fa-envelope contactIcon"></i>
                <article class="text">
                    <h1 class="sub-heading">Email</h1>
                    <p class="para">Email: contectus@gmail.com</p>
                </article>
            </div>

            <div class="method">
                <i class="fa-solid fa-phone contactIcon"></i>
                <article class="text">
                    <h1 class="sub-heading">Phone</h1>
                    <p>+91 8597976177</p>
                    <p>+91 8597976177</p>
                </article>
            </div>
        </div>
    
    </section>
</body>

</html>