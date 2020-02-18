<?php
session_start();
 if(isset($_POST['cantidad']))
     $i= $_POST['i'];
  {
    $_SESSION['Cantidad'][$i]=$_POST['cantidad'];
    exit();
  }