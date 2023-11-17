<?php
require("connection.php");
global $con;
session_start();
if (isset($_POST['submit']) &&isset($_FILES['file'])){
    // Where the file is going to be stored
        $target_dir = "./Files/";
        $file = $_FILES['file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $user =$_SESSION['user']['u_id'];
        
        $sql="select MAX(file_id) from file";
        $result= mysqli_query($con,$sql);
        $new_file_id = mysqli_fetch_assoc($result);
        
        

        $newname = $new_file_id['MAX(file_id)']+1;
        $temp_name = $_FILES['file']['tmp_name'];
        $path_filename_ext = $target_dir.$newname.".".$ext;
     
   
    
    
     $newname .=".".$ext;
     $sql="insert into file (file_id,u_id,file_name,file_type,file_size) VALUES 
              ('$newname','$user','$filename','$type','$size')";
        $result = mysqli_query($con,$sql);
        move_uploaded_file($temp_name,$path_filename_ext);
     header("Location: home.php");
     }
?>