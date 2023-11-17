<?php
require("connection.php");
session_start();
global $con;

if(isset($_GET['filename'])&&isset($_GET['type'])){
$dir = "./Files/".$_GET['filename'];
$type = $_GET['type'];
  
// Header content type
header("Content-type: $type");
header("Content-Length: " . filesize($dir));
  
// Send the file to the browser.
readfile($dir);
   
}?>