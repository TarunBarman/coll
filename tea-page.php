<?php

include("database.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="tea-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="./script.js" type="text/javascript"></script>
</head>

<body>
<?php
// error_reporting(0);
     if(isset($_POST['register']))
     {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/".$filename;
        move_uploaded_file($tempname,$folder);
        
        $id         = $_POST['id'];
        $fname  = $_POST['fname'];
        $lname  = $_POST['lname'];
        $emp_id = $_POST['empid'];
        $gender = $_POST['gender'];
        $category   = $_POST['category'];
        $dob    = $_POST['dob'];
        $email  = $_POST['email'];
        $ph     = $_POST['phone_number'];
        $course = $_POST['course'];
        $post = $_POST['post'];
        $edu = $_POST['education'];
        $lang        = $_POST['languages'];
        $lang1        = implode(",",$lang);

        $file   = $_POST['myfile'];
        
   
        // {
            
            // $filename = $_FILES["uploadfile"]["name"];
            // $tempname = $_FILES["uploadfile"]["tmp_name"];
            // $folder = "images/".$filename;
            // move_uploaded_file($tempname,$folder);
        
            // $fname      = $_POST['fname'];
            // $lname      = $_POST['lname'];
            // $student_id = $_POST['student_id'];
            // $fathername = $_POST['father_name'];
            // $gender     = $_POST['gender'];
            // $dob        = $_POST['dob'];
            // $email      = $_POST['email'];
            // $ph         = $_POST['phone_number'];
            // $course     = $_POST['course'];
            // $add        = $_POST['address'];
            // $state      = $_POST['state'];
            
            // $file      =  $_POST['myfile'];
               
               
        
                // if ($fname != "" && $lname != "" && $fathername != "" && $gender != "" && $category != "" && $dob != "" && $email != "" && $ph != "" && $course != "" && $add != "" && $state != "" && $pin != "" && $file['name'] != "") 
                // {
               
                
                    // id
         
                     $checktea_reg = "SELECT * FROM tea_reg ORDER BY id DESC LIMIT 1";
                     $checkresult = mysqli_query($conn, $checktea_reg);
                     
                     if(mysqli_num_rows($checkresult)>0)
                   {
                        if($row = mysqli_fetch_assoc($checkresult))
                       {
        
                                 $tea_reg = $row['emp_id'];
                                 $get_numbers = str_replace("24T", "", $tea_reg);
                                 $id_increase = (int)$get_numbers+1;
                                 $get_string = str_pad($id_increase, 3,0, STR_PAD_LEFT);
                                 $emp_id = "24T" .$get_string;
        
                                 $insert_qry = "INSERT INTO tea_reg VALUES ('$id','$folder','$fname','$lname', '$emp_id','$gender','$category','$dob', '$email', '$ph','$course','$post','$edu','$lang1','$file')";          
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
                           $insert_qry = "INSERT INTO tea_reg VALUES ('$id','$folder','$fname','$lname', '$emp_id','$gender','$category','$dob', '$email', '$ph','$course','$post','$edu','$lang1','$file')";          

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
        <form action="tea-page.php" method="POST" enctype="multipart/form-data" data-netlify="true">
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
                <div class="inputfield" id="category">
                    <label for="">Category</label>
                    <input type="radio" name="category" id="radio" value="genaral">Genaral
                    <input type="radio" name="category" id="radio" value="sc">SC
                    <input type="radio" name="category" id="radio" value="st">ST
                    <input type="radio" name="category" id="radio" value="obc">OBC
                   
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
                            <option value="zoology">zoology</option>
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
                
                <!-- <div class="inputfield">
                    <label>State</label>
                    <div class="custom_select">
                        <select id="state" name="state" required>
                            <option value="">--Select your state--</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                    </div>
                </div> -->

                <!-- <div class="inputfield">
                    <label>Pin code</label>
                    <input type="text" class="input" name="pincode" placeholder="Enter your pin code" maxlength="6"
                        pattern="^[0-9]{6}$" required>
                </div> -->

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