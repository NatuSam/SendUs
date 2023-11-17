<?php 
session_start();
require("connection.php");
global $con;

if(isset($_POST['delete'])){
    $file = $_POST['delete'];
    $sql = "select * from file where file_id = '$file'";
    $result = mysqli_query($con,$sql);
    $filedir="./Files/";
    if(mysqli_num_rows($result)>0 && file_exists($filedir.$file)){
            $sql = "delete from file where file_id = '$file'";
            $delete = mysqli_query($con,$sql);
            $sql = "delete from share where file_id = '$file'";
            $delete = mysqli_query($con,$sql);
            
            unlink($filedir.$file); 
            header("Location: home.php");
    }
    else{
        echo "<h1>404</h1><p>file does not exist</p>";
    }

}