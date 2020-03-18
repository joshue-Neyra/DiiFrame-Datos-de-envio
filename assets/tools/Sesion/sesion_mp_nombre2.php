<?php
session_start();
$Mp=$_POST['Mp'];
$Ori=$_POST['Ori'];
//$nombre=$_POST['Nombre'];
$_SESSION['Mp']=$Mp;
$_SESSION['Orientacion']=$Ori;
//$_SESSION['Nombre']="$nombre";
echo $Mp;