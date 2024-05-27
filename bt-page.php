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
    <title>add batch</title>
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
        $batch_id  = $_POST['batch_id'];
        $bname      = $_POST['bname'];
        $bdu        = $_POST['bdu'];
        
       

        // if ($fname != "" && $lname != "" && $fathername != "" && $gender != "" && $category != "" && $dob != "" && $email != "" && $ph != "" && $course != "" && $add != "" && $state != "" && $pin != "" && $file['name'] != "") 
        // {
       
        
            // id
 
             $checkadd_bt = "SELECT * FROM add_bt ORDER BY id DESC LIMIT 1";
             $checkresult = mysqli_query($conn, $checkadd_bt);
             
             if(mysqli_num_rows($checkresult)>0)
           {
                if($row = mysqli_fetch_assoc($checkresult))
               {

                         $add_bt = $row['batch_id'];
                         $get_numbers = str_replace("24B", "", $add_bt);
                         $id_increase = (int)$get_numbers+1;
                         $get_string = str_pad($id_increase, 3,0, STR_PAD_LEFT);
                         $batch_id = "24B" .$get_string;

                         $insert_qry = "INSERT INTO add_bt VALUES ('$id','$batch_id','$bname','$bdu')";          
                         $result = mysqli_query($conn, $insert_qry);

                           if($result)
                             {
                              echo "<script> alert('batch Id: .$batch_id') </script>";
                              ?>
                              <meta http-equiv = "refresh" content = "0; url = http://localhost/coll/bt-page.php" />
 
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
                   $batch_id = "24B001";
                   $insert_qry = "INSERT INTO add_bt  VALUES ('$id','$batch_id','$bname','$bdu')";          
                   $result = mysqli_query($conn, $insert_qry);                 
                       if($result)
                       {               
                         echo "<script> alert('batch Id: .$batch_id') </script>";
                         ?>
                             <meta http-equiv = "refresh" content = "0; url = http://localhost/coll/bt-page.php" />

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
        <div class="title">Add New batch
        </div>
        <form action="bt-page.php" enctype="multipart/form-data"  method="POST">
            <div class="form">

                         <!-- <div class="inputfield">
                            <label for="course_code">Course Code</label>
                            <input type="text" class="input" name="course_code" required>
                        </div> -->

                        <div class="inputfield">
                            <label for="batch_name">Batch Name</label>
                            <input type="text" class="input" name="bname" required>
                        </div>
                        <div class="inputfield">
                            <label for="batch_name">Batch Years</label>
                            <input type="text" class="input" name="bdu" required>
                        </div>

                      

                       
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