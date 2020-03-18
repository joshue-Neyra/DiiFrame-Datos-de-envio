<?php
session_start();
//$Mp=$_GET['Mp'];
//$Ori=$_GET['Ori'];
$URL_INSTAGRAM=$_POST['url'];
$at=$_POST['at'];
//$_SESSION['Mp']=$Mp;
//$_SESSION['Orientacion']=$Ori;
$_SESSION['Nombre']="$URL_INSTAGRAM";

if($_SESSION['Nombre'] =='' or $_SESSION['Nombre'] =='NULL'){
    echo $_SESSION['Nombre'];
}
else{
    echo 'ok';
}