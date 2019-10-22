
<?php
session_start();
$Mp=$_GET['Mp'];
$nombre=$_GET['Nombre'];
$_SESSION['Mp']=$Mp;
$_SESSION['Nombre']=$nombre;