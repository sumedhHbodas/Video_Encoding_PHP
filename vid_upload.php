<?php
include "DBconfig.php";

if (isset($_POST['submit'])){
    $maxUploadSize = 314572800; //300mb

    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
        $name = $_FILES['file']['name'];
        $target_dir = "Uploads/";
        $target_file = $target_dir.$name;

        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $allowed_extensions_arr = array("WEBM", "MPG", "MP2", "MPEG", "MPE", "MPV", "OGG", "MP4", "M4P", "M4V", "AVI", "WMV", "MOV", "QT", "FLV", "SWF");
        $j = 0;
        foreach( $allowed_extensions_arr as $element ) { 
            $allowed_extensions_arr[$j] = strtolower($element);
               
            $j++;
        }

            if (in_array($extension, $allowed_extensions_arr)) {

                if ($_FILES['file']['size'] >= $maxUploadSize)
                {
                    $_SESSION['message'] = "File size is too large. File must be less than 300mb";
                }else {
                    
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                        $sql_insert = " INSERT INTO myuploads (Name, Location) VALUES ('".$name."', '".$target_file."') ";
                        mysqli_query($dbConnect, $sql_insert);

                        $_SESSION [ 'message'] = "File uploaded Successfully";
                        
                    }
                }
                
            }else {
                $_SESSION['message'] = "Invalid file selection ---> Please select a valid file extension";
            }
        
    }
    else {
        $_SESSION['message'] = "Please select a file to upload.";
    }
    header("location: vid_upload.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>

    <form method="post" action="" enctype="multipart/form-data" id="uploadform" >
        <input type="file" name="file" id = "file">
        <br>
        <input class = "upload_button" type="submit" name="submit" value="upload">
    </form>

    <div class="progress-bar" id="progressBar">
        <div class="progress-bar-fill">
            <span class="Progress-bar-text"> 0% </span> 
        </div>
    </div>

    <form method = "post" action = "Myuploads.php" enctype="multipart/form-data">
    <input type= "submit", value = "My Uploads" class = "Myuploads">
</form>
   
    
     <!-- <script src="reqscript.js"> </script> -->

</body>
</html>