<?php

include("database.php");

$id = $_GET["id"];

$query = "DELETE FROM TEACHER_REG WHERE id = '$id' ";

$data = mysqli_query($conn,$query);

if($data){
     echo "<script> alert('Record Delete') </script>";
    ?>

    <meta http-equiv = "refresh" content = "0.3; url = http://localhost/coll/tea-dlt2.php" />


    <?php
}
else{
    echo "<script> alert('Failed to Delete') </script>";
}


?>