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
    <title>Student Registration</title>
    <link rel="stylesheet" href="std-style.css">
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
    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $student_id = $_POST['student_id'];
    $fathername = $_POST['father_name'];
    $gender     = $_POST['gender'];
    $category   = $_POST['category'];
    $dob        = $_POST['dob'];
    $email      = $_POST['email'];
    $ph         = $_POST['phone_number'];
    $course     = $_POST['course'];
    $add        = $_POST['address'];
    $state      = $_POST['state'];
    $pin        = $_POST['pincode'];
    $file      =  $_POST['myfile'];
       
       

        // if ($fname != "" && $lname != "" && $fathername != "" && $gender != "" && $category != "" && $dob != "" && $email != "" && $ph != "" && $course != "" && $add != "" && $state != "" && $pin != "" && $file['name'] != "") 
        // {
       
        
            // id
 
             $checkstd_reg = "SELECT * FROM std_reg ORDER BY id DESC LIMIT 1";
             $checkresult = mysqli_query($conn, $checkstd_reg);
             
             if(mysqli_num_rows($checkresult)>0)
           {
                if($row = mysqli_fetch_assoc($checkresult))
               {

                         $std_reg = $row['student_id'];
                         $get_numbers = str_replace("24S", "", $std_reg);
                         $id_increase = (int)$get_numbers+1;
                         $get_string = str_pad($id_increase, 3,0, STR_PAD_LEFT);
                         $student_id = "24S" .$get_string;

                         $insert_qry = "INSERT INTO std_reg VALUES ('$id','$folder','$fname','$lname', '$student_id', '$fathername','$gender','$category','$dob', '$email', '$ph','$course','$add','$state','$pin','$file')";          
                         $result = mysqli_query($conn, $insert_qry);

                           if($result)
                             {
                              echo "<script> alert('registration Number: .$student_id') </script>";
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
                   $student_id = "24S001";
                   $insert_qry = "INSERT INTO std_reg  VALUES ('$id','$folder','$fname','$lname', '$student_id', '$fathername','$gender','$category','$dob', '$email', '$ph','$course','$add','$state','$pin','$file')";          
                   $result = mysqli_query($conn, $insert_qry);                 
                       if($result)
                       {               
                         echo "<script> alert('registration Number: .$student_id') </script>";
                         ?>
                             <meta http-equiv = "refresh" content = "0; url = http://localhost/coll/user-index.php" />

                        <?php             
                    }   
                     else
                      {
                       echo "error";      
                }
            }        
            // else{ 
            // echo "Please fill the field";
            //                 } 
 }

    // }
   

    //     if($id != "" &&  $fname != "" && $lname != "" && $student_id != "" &&  $fathername != "" &&  $gender != "" &&  $category != "" &&  $dob != "" &&  $email != "" && $ph != "" && $course != "" && $add != "" && 
    //     $state != "" && $pin != "" && $file != "" )

    //     $query =  "INSERT INTO std_reg values('$id','$fname','$lname', '$student_id', '$fathername','$gender','$category','$dob', '$email', '$ph','$course','$add','$state','$pin','$file')";
    //     $data = mysqli_query($conn,$query);

    //     if($data)
    //     {
    //         echo "<script> alert('Data inserted Succecfully') </script>";
    //         // header('location:.php');
    //     }
    //     else
    //     {
    //         echo "failed";
    //     }
    // }
    
    // else{
    //     echo "Please fill the field";

    // }

?>

    <div class="wrapper">
        <div class="title">Student Registration
        </div>
        <form action="std-page.php" enctype="multipart/form-data"  method="post">
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
                <!-- <div class="inputfield" id="rollno">
                    <label for="">RollNo</label>
                    <input type="text" name="rollno" value="" id="rollno">
                    
                </div> -->
                <div class="inputfield">
                    <label>Father Name</label>
                    <input type="text" class="input" id="name" name="father_name" placeholder="Enter Father name"
                        maxlength="30" pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
                </div>

                <!-- <div class="inputfield">
                    <label>Gender</label>
                    <div class="custom_select">
                        <select id="gender" name="gender" required>
                            <option value="">--Select your Gender--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                         </select>
                     </div>
                </div> -->

                <div class="inputfield" id="gender">
                    <label for="">Gender</label>
                    <input type="radio" name="gender" id="radio" value="Male" ><label>Male</label>
                    <input type="radio" name="gender" id="radio" value="Female" ><label>Female</label>
                </div>
                <div class="inputfield">
                    <label>category</label>
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



                <!-- <div class="inputfield" id="category">
                    <label for="">category</label>
                    <input type="radio" name="category" id="radio" value="genaral">Genaral
                    <input type="radio" name="category" id="radio" value="sc">SC
                    <input type="radio" name="category" id="radio" value="st">ST
                    <input type="radio" name="category" id="radio" value="obc">OBC

                </div> -->


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
                        placeholder="Enter your phone number" title="Please enter valid phone number">
                </div>
                <div class="inputfield">
                    <label>Course</label>
                    <div class="custom_select">
                        <select id="state" name="course" required>
                            <option value="">--Select your Course--</option>
                            <option value="Botany">Botany</option>
                            <option value="Chemistry">Chemistry</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="zoology">zoology</option>
                        </select>
                    </div>
                </div>

                <div class="inputfield">
                    <label>Address</label>
                    <textarea class="textarea" name="address" id="" cols="30" rows="5" placeholder="Enter your address"
                        pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" maxlength="100" required></textarea>
                </div>

                <div class="inputfield">
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
                </div>

                <div class="inputfield">
                    <label>Pin Code</label>
                    <input type="text" class="input" name="pincode" placeholder="Enter your pin code" maxlength="6"
                        pattern="^[0-9]{6}$" required>
                </div>
                <div class="inputfield">
                    <label>Upload Image</label>
                    <p id="file-size">*Max size 100kb.</p>
                    <input type="file" name="uploadfile" id="" required>
                    
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
                    <button type="submit" value="Register" name="register" class="btn"
                        onclick="checkPassword()">Register</button>
                    <button type="reset" value="Reset" class="btn">Reset</button>
                </div>

            </div>
        </form>
    </div>

</body>

</html>