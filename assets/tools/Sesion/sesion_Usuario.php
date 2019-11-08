<?php
session_start();

if ($_SESSION['Id'] == "" || $_SESSION['Id'] == NULL){
	//echo $_SESSION['Usuario'];
	header ("Location: /login/");
	
}