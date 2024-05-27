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
    <title>add course</title>
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
    
   

        $id         = $_POST['id'];
        $course_id  = $_POST['course_id'];
        $cname      = $_POST['cname'];
        $cdes       = $_POST['cdes'];
        $cdu        = $_POST['cdu'];
        
       

        // if ($fname != "" && $lname != "" && $fathername != "" && $gender != "" && $category != "" && $dob != "" && $email != "" && $ph != "" && $course != "" && $add != "" && $state != "" && $pin != "" && $file['name'] != "") 
        // {
       
        
            // id
 
             $checkadd_cr = "SELECT * FROM add_cr ORDER BY id DESC LIMIT 1";
             $checkresult = mysqli_query($conn, $checkadd_cr);
             
             if(mysqli_num_rows($checkresult)>0)
           {
                if($row = mysqli_fetch_assoc($checkresult))
               {

                         $add_cr = $row['course_id'];
                         $get_numbers = str_replace("24C", "", $add_cr);
                         $id_increase = (int)$get_numbers+1;
                         $get_string = str_pad($id_increase, 3,0, STR_PAD_LEFT);
                         $course_id = "24C" .$get_string;

                         $insert_qry = "INSERT INTO add_cr VALUES ('$id','$course_id','$cname','$cdes','$cdu')";          
                         $result = mysqli_query($conn, $insert_qry);

                           if($result)
                             {
                              echo "<script> alert('Course Id: .$course_id') </script>";
                              ?>
                              <meta http-equiv = "refresh" content = "0; url = http://localhost/coll/ac-page.php" />
 
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
                   $course_id = "24C001";
                   $insert_qry = "INSERT INTO add_cr  VALUES ('$id','$course_id','$cname','$cdes','$cdu')";          
                   $result = mysqli_query($conn, $insert_qry);                 
                       if($result)
                       {               
                         echo "<script> alert('Course Id: .$course_id') </script>";
                         ?>
                             <meta http-equiv = "refresh" content = "0; url = http://localhost/coll/ac-page.php" />

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
        <div class="title">Add New Course
        </div>
        <form action="ac-page.php" enctype="multipart/form-data"  method="POST">
            <div class="form">

                         <!-- <div class="inputfield">
                            <label for="course_code">Course Code</label>
                            <input type="text" class="input" name="course_code" required>
                        </div> -->

                        <div class="inputfield">
                            <label for="course_name">Course Name</label>
                            <input type="text" class="input" name="cname" required>
                        </div>

                        <div class="inputfield">
                            <label for="course_description">Course Description</label>
                            <textarea class="textarea" name="cdes" required></textarea>
                        </div>

                        <div class="inputfield">
                            <label for="course_duration" name="cdu">Course Duration</label>
                            <div class="custom_select">
                                <select  name="cdu" required>
                                    <option value="0">0 Years</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="4">4 Years</option>
                                    <option value="5">5 Years</option>
                                </select>
                                <!-- <select name="months" required>
                                    <option value="0">0 Months</option>
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Months</option>
                                    <option value="3">3 Months</option>
                                    <option value="4">4 Months</option>
                                    <option value="5">5 Months</option>
                                    <option value="6">6 Months</option>
                                    <option value="7">7 Months</option>
                                    <option value="8">8 Months</option>
                                    <option value="9">9 Months</option>
                                    <option value="10">10 Months</option>
                                    <option value="11">11 Months</option>
                                </select>
                                <select name="weeks" required>
                                    <option value="0">0 Weeks</option>
                                    <option value="1">1 Week</option>
                                    <option value="2">2 Weeks</option>
                                    <option value="3">3 Weeks</option>
                                    <option value="4">4 Weeks</option>
                                </select> -->
                            </div>
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
                    <button type="submit" value="register" name="register" class="btn"
                        onclick="checkPassword()">Add</button>
                    <button type="reset" value="Reset" class="btn">Reset</button>
                </div>

            </div>
        </form>
    </div>

</body>

</html>