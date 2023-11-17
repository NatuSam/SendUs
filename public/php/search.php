<?php
require("connection.php");
require("display.php");
session_start();
global $con;

if(isset($_POST['search'])){
    $s=$_POST['search'];
    $user = $_SESSION['user']['u_id'];
    $sql= "select * from file where u_id = '$user' AND file_name like '%$s%'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
    $_SESSION['search']=mysqli_fetch_all($result);
    $_SESSION['key']=$s;
    }
    else{
        $_SESSION['search']['no']=1;
    }
    header("Location: home.php");
}

?>