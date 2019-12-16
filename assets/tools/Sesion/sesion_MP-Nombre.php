<?php
session_start();
$Mp=$_GET['Mp'];
$Ori=$_GET['Ori'];
$nombre=$_GET['Nombre'];
$_SESSION['Mp']=$Mp;
$_SESSION['Orientacion']=$Ori;
$_SESSION['Nombre']="/assets/tools/imageupload/$nombre";