
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
   <link rel="stylesheet" href="display-style.css">
   <style>
    .update {
    background-color: green;
    color: white;
    border: 1px solid black;
    border-radius: 5px;
  padding: 5px 8px;
  outline:none;
  margin: 4px;


}

.update:hover {
    transition: 0.2s ease-in-out;
    /* opacity: 0.4; */
    background-color: #F66F4D; ;
    color: black;
    cursor: pointer;
    border: 1px solid black;
}
.delete {

 background-color:#F66F4D;
 color: gray;
    border: 1px solid black;
    border-radius: 5px;
  padding: 5px 10px;
  outline:none;
  margin: 4px;
}
.delete:hover {

 background-color:green;
 color: white;

}

table th,tr,td{
   
    text-align:center;
    box-sizing: border-box;
    border: 2px solid black;
    /* border:none; */
   

}
table th{
    padding: 5px 8px;
    font-size: 15px;
    font-weight: 500;
    
}
table td{
    font-size: 10px;


}


    </style>
</head>
<body>
<header>
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
                    <a href="logout.php" class="nav-btn">
                        Sing out
                        <img src="assets/img/Vector.png" alt="">
                    </a>
                    <a href="#"><i class="fa-solid fa-bars" id="menu-icon"></i></a>
                    <!-- <div class="mob-bar">
                        <i class="fa-solid fa-bars"></i>
                    </div> -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- main -->
    <section class="first-section">

        <div class="text-container">
            <h2> Wellcome to</h2>
            <h1 class="lg_text">Students Record</h1>
        </div>
    </section>
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

<center>
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
    </tr>



<?php

    while($result = mysqli_fetch_assoc($data))
    
    {
        echo
        "<tr>
            <td>".$result['id']."</td>
            <td><img src='".$result['std_images']."' height='100px' width='100px'></td>
            <td>".$result['fname']."</td>
            <td>".$result['lname'] ."</td>
            <td>".$result['student_id'] ."</td>
            <td>".$result['fathername'] ."</td>
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
            // <a href='update-std.php?id=$result[id]'><input type='submit' value='update' class='update'></a>
            // <a href='preview.php?id=$result[id]'><input type='submit' value='view' class='view'></a>
            // &fn=$result[fname]&ln=$result[lname]&si=$result[student_id]&ftn=$result[fathername]&gen=$result[gender]&cat=$result[category]&dob=$result[dob]&em=$result[email]&ph=$result[ph]&course=$result[course]&add=$result[address]&st=$result[state]&pin=$result[pin]&photo=$result[photo]'>
            // <td> <a href='update-std.php?id= <?php echo $result['id']; 
        
        
    }
    // echo "Table has record";
}

else
{
    echo "Table has no record";
}

?>
</table>
</center>
<script>
    function checkdelete()
    {
        return confirm('Are you sure you want to delete this record?');
    }

    </script>
