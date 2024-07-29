
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display add course</title>
   <link rel="stylesheet" href="display-style.css">

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

    <!-- main -->
    <main class="table" id="customers_table">
   
   <section class="table__header">
       <h2>Welcome to</h2>
       <h1 class="lg_text">Course Record</h1>
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
   <th width=15%>Course Id  <span class="icon-arrow">&UpArrow;</span></th>
   <th width=15%>Course  Name  <span class="icon-arrow">&UpArrow;</span></th>
   <th width=15%>Course Description  <span class="icon-arrow">&UpArrow;</span></th>
   <th width=15%>Course Duration (Years)  <span class="icon-arrow">&UpArrow;</span></th>  
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
$query = " SELECT *  FROM ADD_CR ";
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
        <th width=5%>Course Id</th>
        <th width=15%>Course Name</th>
        <th width=15%>Course Description</th>
        <th width=7%>Course Duration (Years)</th>
        <th width=50% >Operation</th>
    </tr> -->



<?php

    while($result = mysqli_fetch_assoc($data))
    
    {
        echo
        "<tr>
            <td>".$result['id']."</td>
            <td>".$result['course_id'] ."</td>
            <td>".$result['cname']."</td>
            <td>".$result['cdes'] ."</td>
            <td>".$result['cdu'] ."</td>
           
           
          <td>
            
            <a href='delete-ac.php?id=$result[id]'><input type='submit' value='delete' class='delete' onclick = 'return checkdelete()'></a></td>
            
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

