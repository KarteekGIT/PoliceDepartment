<?php
ob_start();
session_start();

//database parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWORD', '');
define('DB_NAME', 'police');

//don't disturb the following lines
//inclusions
require_once('functions/DB.php');
$connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

try{
	$PDODB = new PDO($connectionString, DB_USER, DB_PWORD);
	$PDODB->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
}catch(PDOException $e){
	echo $e->getMessage();
}
if(!isset($_SESSION['cnt'])){
$_SESSION['cnt']=0;
}
?>