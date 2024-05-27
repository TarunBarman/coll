<?php
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fileupload</title>
    

</head>

<body>
    <div class="wrapper">
        <div class="title">Teachers Registration
        </div>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form">
                <div class="inputfield">
                    <label>Upload Photo</label>
                    <p>*Max size 100kb.</p>
                    <input type="file" name="uploadfile" id="">

                </div>
                <div class="inputfield btns" id="btn">
                    <button type="submit" value="upload file" name="submit" class="btn"
                        >register</button>
                  
                </div>
            </div>
        </form>
    </div>

</body>

</html>
<?php
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname,$folder);
echo "<img src='$folder' height='100px' width='100px'>";
// echo $_FILES["myfile"];

// print_r($_FILES["myfile"]);
// echo $folder;

?>
<!-- <img src="images/pics.png" alt="" height=100px width=100px> -->