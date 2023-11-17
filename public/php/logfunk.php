<?php
require("connection.php");
session_start();
global $con;
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['username'])) {
    $name = htmlspecialchars($_POST['username']);
    $pword = htmlspecialchars($_POST['password']);
    $query = "Select * from user where user_name = '$name' AND password = '$pword'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {

        $_SESSION['user'] = mysqli_fetch_assoc($result);
        header("location:home.php");
    } else {
        $_SESSION['error'] = "<h1 id=\"wrong\" style=\"display:block; color:RED;padding-left: 10%; width:100%;\">
        Wrong Password!</h1>";
        header("location:login.php");
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nwusername'])) {
    $name = htmlspecialchars($_POST['nwusername']);
    $pword = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);

    $query = "select * from user where user_name = '$name'";
    $result = mysqli_query($con, $query);

    if (strlen($pword) < 8) {
        $_SESSION['error'] = "<h1>Password must contain 8 characters</h1>";
        header("location:login.php");
    } else if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = "<h1>The username is taken</h1>";
        header("location:login.php");
    } else {
        $target_dir = "./Profiles/";
        //print_r($_FILES);
        $file = $_FILES['profile']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];

        $sql = "select MAX(u_id) from user";
        $result = mysqli_query($con, $sql);
        $new_file_id = mysqli_fetch_assoc($result);

        $filename = $new_file_id['MAX(u_id)'] + 1;
        $temp_name = $_FILES['profile']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        move_uploaded_file($temp_name, $path_filename_ext);
        $filename .=".".$ext;


        $query = "insert into user(user_name,password,email, profile) VALUES ('$name','$pword','$email','$filename')";
        $result = mysqli_query($con, $query);
        header("Location: login.php");
    }
}