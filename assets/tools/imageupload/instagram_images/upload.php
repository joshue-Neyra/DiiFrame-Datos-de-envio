<?php
    $srcfile = $_POST["url"]; 
    $destfile =$_POST["name"]; 
    $srcfile ="$srcfile";
    $destfile ="$destfile";
    mkdir(dirname($dstfile), 0777, true);
    if (!copy($srcfile, $destfile)) { 
    echo "File cannot be copied! \n"; 
        $errors= error_get_last();
    echo "COPY ERROR: ".$errors['type'];
    echo "<br />\n".$errors['message'];
} 
else { 
    //echo "File has been copied"; 
    session_start();
    $_SESSION['Nombre'] = "/assets/tools/imageupload/instagram_images/$destfile";
    if($_SESSION['Nombre'] =='' or $_SESSION['Nombre'] =='NULL'){
    echo $_SESSION['Nombre'];
    }
    else{
        echo 'ok';
    }
} 

