
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display student</title>
    <link rel="stylesheet" type="text/css" href="display-style.css">
    
</head>
<body>
<header style=" box-shadow: 0px 5px 9px #0000006b">
        <nav>
            <div class="nav-container">
                <!-- <div class="nav-logo"> -->

                <img src="assets/img/logo.png" alt="logo">
                <!-- </div> -->
                <div class="nav-list">
                    <div class="nav-list1">
                    
                    </div>
                </div>
                <ul class="nav-bar">
                <a href="logout.php" class="nav-btn" >
                <button class="nav-t">   Sign out 
                <img src="assets/img/Vector.png" alt="">
                 <span class="first"></span>
                 <span class="second"></span>
                 <span class="third"></span>
                 <span class="fourth"></span>
                    </button></a>
                    <!-- <a href="logout.php" class="nav-btn">
                        Sign out
                        <img src="assets/img/Vector.png" alt="">
                    </a> -->
                    <a href="#"><i class="fa-solid fa-bars" id="menu-icon"></i></a>
                    <!-- <div class="mob-bar">
                        <i class="fa-solid fa-bars"></i>
                    </div> -->
                </ul>
            </div>
        </nav>
    </header>
    <main class="table" id="customers_table">
   
        <section class="table__header">
            <h2>Welcome to</h2>
            <h1 class="lg_text">Students Record</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
            
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>                
        <th width=5%>id  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=15%>image  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=15%>First Name  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=15%>Last Name  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=>Student_id <span class="icon-arrow">&UpArrow;</span></th>
        <th width=>Gender  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=>Category  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=20%>Dath of Birth  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=>Email  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=>Phone No  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=>Course  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=>Address  <span class="icon-arrow">&UpArrow;</span></th>
        <th width=>state <span class="icon-arrow">&UpArrow;</span></th>
        <th width=>Pin-code <span class="icon-arrow">&UpArrow;</span></th>  
        <th width=>Operation  <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
               

        </section>
    </main>
  
    </body>
</html>



<?php


include("database.php");
session_start();
error_reporting(0);
$query = " SELECT *  FROM STD_REG ";
// $insert_qry = " SELECT *  FROM std_reg ";

$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);




//  echo $total;

  
if($total != 0)
{
    

    
 ?>

<!-- <center>
    <table border=1px cellspacing=4>
    <tr>


        <th width=5%>id</th>
        <th width=5%>image</th>
        <th width=15%>First Name</th>
        <th width=15%>Last Name</th>
        <th width=7%>Student_id</th>
        <th width=15%>Father Name</th>
        <th width=10%>Gender</th>
        <th >Category</th>
        <th width=>Dath of Birth</th>
        <th >Email</th>
        <th >Phone No</th>
        <th width=>Course</th>
        <th >Address</th>
        <th >State</th>
        <th >Pin Code</th>  
        <th width=50% >Operation</th>
    </tr> -->



<?php

    while($result = mysqli_fetch_assoc($data))
    
    {
        echo
        "<tr>
            <td>".$result['id']."</td>
            <td><img src='".$result['std_images']."' height='90px' width='90px'></td>
            <td>".$result['fname']."</td>
            <td>".$result['lname'] ."</td>
            <td>".$result['student_id'] ."</td>
            <td>".$result['gender'] ."</td>
            <td>".$result['category']."</td>
            <td>".$result['dob']."</td>
            <td>".$result['email'] ."</td>
            <td>".$result['ph'] ."</td>
            <td>".$result['course'] ."</td>
            <td>".$result['address'] ."</td>
            <td>".$result['state'] ."</td>
            <td>".$result['pin'] ."</td>
           
          
            <td>
            <a href='update-std.php?id=$result[id]'><input type='submit' value='update' class='update'></a>           
            <a href='delete-std.php?id=$result[id]'><input type='submit' value='delete' class='delete' onclick = 'return checkdelete()'></a></td>
            
            </tr>
            ";
        
        
    }
    // echo "Table has record";
}

else
{
    echo "Table has no record";
}

?>
</table>
<script src="display-script.js"></script>
</body>
</html>
