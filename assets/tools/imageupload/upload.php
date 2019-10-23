<?php
$ruta="/assets/tools/imageupload/";//ruta carpeta donde queremos copiar las imágenes
$uploadfile_temporal=$_FILES['croppedImage']['tmp_name'];
$uploadfile_nombre=$_FILES['croppedImage']['name'];

if (is_uploaded_file($uploadfile_temporal))
{
    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
    echo "Image has been uploaded";
}
else
{
echo "error";
}
