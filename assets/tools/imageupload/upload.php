<?php
$nombre = basename($_FILES['croppedImage']["name"]);
move_uploaded_file($_FILES["croppedImage"]["tmp_name"], "$nombre");
echo "Image has been uploaded";