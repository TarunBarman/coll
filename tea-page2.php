<?php

include("database.php");
session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
    <link rel="stylesheet" href="reg2-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="./script.js" type="text/javascript"></script>
</head>

<body>
<?php
error_reporting(0);
     if(isset($_POST['register']))
     {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/".$filename;
        move_uploaded_file($tempname,$folder);
        
        $id     = $_POST['id'];
        $fname  = $_POST['fname'];
        $lname  = $_POST['lname'];
        $emp_id = $_POST['emp_id'];
        $gender = $_POST['gender'];
        $category   = $_POST['category'];
        $dob    = $_POST['dob'];
        $email  = $_POST['email'];
        $ph     = $_POST['phone_number'];
        $course = $_POST['course'];
        $post = $_POST['post'];
        $edu = $_POST['education'];
        $lang        = $_POST['languages'];
        // $lang1        = implode(",",$lang); 
        $languages = implode(',', $_POST['languages']);
        $file   = $_POST['myfile'];
        
         
                     $checktea_reg = "SELECT * FROM teacher_reg ORDER BY id DESC LIMIT 1";
                     $checkresult = mysqli_query($conn, $checktea_reg);
                     
                     if(mysqli_num_rows($checkresult)>0)
                   {
                        if($row = mysqli_fetch_assoc($checkresult))
                       {
        
                                 $teacher_reg = $row['emp_id'];
                                 $get_numbers = str_replace("24T", "", $teacher_reg);
                                 $id_increase = (int)$get_numbers+1;
                                 $get_string = str_pad($id_increase, 3,0, STR_PAD_LEFT);
                                 $emp_id = "24T" .$get_string;
        
                                 $insert_qry = "INSERT INTO teacher_reg VALUES ('$id','$folder','$fname','$lname', '$emp_id','$gender','$category','$dob', '$email', '$ph','$course','$post','$edu','$languages','$file')";          
                                 $result = mysqli_query($conn, $insert_qry);
        
                                   if($result)
                                     {
                                      echo "<script> alert('Employe Number: .$emp_id') </script>";
                                      ?>
                                      <meta http-equiv = "refresh" content = "0; url = http://localhost/coll/user-index.php" />
         
                                 <?php 
                                       }
                                     else
                                        {
                                          echo "error";
                                         }                   
                        }
                    }      
                           else
                          {
                           $emp_id = "24T001";
                           $insert_qry = "INSERT INTO teacher_reg VALUES ('$id','$folder','$fname','$lname', '$emp_id','$gender','$category','$dob', '$email', '$ph','$course','$post','$edu','$languages','$file')";          

                           $result = mysqli_query($conn, $insert_qry);                 
                               if($result)
                               {               
                                 echo "<script> alert('employe Number: .$emp_id') </script>";
                                 ?>
                                     <meta http-equiv = "refresh" content = "0; url = http://localhost/coll/user-index.php" />
        
                                <?php             
                            }   
                             else
                              {
                               echo "error";      
                        }
                    } 
  
                }
?>
    <div class="wrapper">
        <div class="title">Teachers Registration
        </div>
        <form action="tea-page2.php" method="POST" enctype="multipart/form-data" data-netlify="true">
            <div class="form">

                <div class="inputfield">
                    <label>First Name</label>
                    <input type="text" class="input" id="name" name="fname" placeholder="Enter first name"
                        maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>

                <div class="inputfield">
                    <label>Last Name</label>
                    <input type="text" class="input" id="name" name="lname" placeholder="Enter last name" maxlength="30"
                        pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>
              
              

                <div class="inputfield" id="gender">
                    <label for="">Gender</label>
                    <input type="radio" name="gender" id="radio" value="Male">Male
                    <input type="radio" name="gender" id="radio" value="Female">Female
                </div>
                <!-- <div class="inputfield" id="category">
                    <label for="">Category</label>
                    <input type="radio" name="category" id="radio" value="genaral">Genaral
                    <input type="radio" name="category" id="radio" value="sc">SC
                    <input type="radio" name="category" id="radio" value="st">ST
                    <input type="radio" name="category" id="radio" value="obc">OBC
                   
                </div> -->
                <div class="inputfield">
                    <label>Category</label>
                    <div class="custom_select">
                        <select id="category" name="category" required>
                            <option value="">--Select your category--</option>
                            <option value="genaral">Genaral</option>
                            <option value="sc">SC</option>
                            <option value="st">ST</option>
                            <option value="obc">OBC</option>
                         </select>
                     </div>
                </div>

                <div class=" inputfield">
                    <label for="">Date of Birth</label>
                    <input type="date" class="input" name="dob" required>
                </div>
                

                <div class="inputfield">
                    <label>Email Address</label>
                    <input type="email" class="input" name="email" placeholder="Enter your email"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required>
                </div>



                <p id="message"></p>

                <div class="inputfield">
                    <label for="">Phone Number</label>
                    <div class="custom-select" id="phone-codes">
                        <select id="phone-code">
                            <option value="+91">+91</option>
                        </select>
                    </div>
                    <input type="text" class="input" name="phone_number" maxlength="10" id="phone-number"
                        placeholder="Enter your phone number" pattern="[7-9]{1}[0-9]{9}"
                        title="Please enter valid phone number">
                </div>
                <div class="inputfield">
                    <label>Department (Subject)</label>
                    <div class="custom_select">
                        <select id="course" name="course" required>
                            <option value="">--Select your subject--</option>
                            <option value="Botany">Botany</option>
                            <option value="Chemistry">Chemistry</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="zoology">Zoology</option>
                        </select>
                    </div>
                </div>
                <div class="inputfield">
                    <label>Designation</label>
                    <div class="custom_select">
                        <select id="post" name="post" required>
                            <option value="">--Select--</option>
                            <option value="Professor">Professor(HOD)</option>
                            <option value=" Assistant Professor">Assistant Professor</option>
                            <option value="Associate Professor">Associate Professor</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="inputfield">
                    <label> Teaching Exprience</label>
                    <input type="text" class="input" id="name" name="" placeholder="--Enter--" maxlength="30"
                        pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div> -->

                <div class="inputfield">
                    <label>Education Qualification
                    </label>
                    <textarea class="textarea" name="education" id="" cols="30" rows="5" placeholder="Enter education details"
                        pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" maxlength="100" required></textarea>
                </div>

                <div class="inputfield">
                    <label>Upload Photo</label>
                    <p id="file-size">*Max size 100kb.</p>
                    <input type="file" name="uploadfile" id="" placeholder="Upload your photo" rows="7" required />

                </div>
                <div class="inputfield">
                <label for="languages">Languages Known:</label><br>
        
                          <input type="checkbox" id="english" name="languages[]" value="English">
                          <label for="english">English</label><br>

                           <input type="checkbox" id="hindi" name="languages[]" value="Hindi">
                           <label for="hindi">Hindi</label><br>
        
                          <input type="checkbox" id="bengali" name="languages[]" value="Bengali">
                          <label for="bengali">Bengali</label><br>
        
                           <input type="checkbox" id="nepali" name="languages[]" value="Nepali">
                           <label for="nepali">Nepali</label><br>
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
                    <button type="submit" value="Register" name="register" class="btn" onclick="checkPassword()">Register</button>
                    <button type="reset" value="Reset" class="btn">Reset</button>
                </div>

            </div>
        </form>
    </div>

</body>

</html>