<?php
require("connection.php");



function share($Suser, $Ruser, $file)
{

    global $con;
    $usersql = "select * from user where user_name= '$Ruser' limit 1";
    $userRes = mysqli_query($con, $usersql);
    $R = mysqli_fetch_array($userRes);


    $filesql = "select * from file where file_name = '$file' AND u_id = '$Suser' limit 1";
    $fileRes = mysqli_query($con, $filesql);
    $f = mysqli_fetch_array($fileRes);
    if (mysqli_num_rows($userRes) <= 0) {
        echo "<p class=\"error\">Wrong username<p>";
    } else if (mysqli_num_rows($fileRes) <= 0) {
        echo "<p class=\"error\">No File<p>";
    } else {
        $sql = "INSERT INTO `share`(`sender_id`, `receiver_id`, `file_id`) 
    VALUES ('$Suser','$R[0]','$f[0]') ";
        $send = mysqli_query($con, $sql);
        echo "<p >Send<p>";
    }

}

//display sent
function shareDisp($uid)
{
    global $con;

    $sql = "select * from share where sender_id='$uid'";
    $result = mysqli_query($con, $sql);
    $share = mysqli_fetch_all($result);
    if (!empty($share)) {
        // echo "<pre>";
        // print_r($share);
        // echo "</pre>";
         echo "<table>";
        foreach ($share as $sh => $v):
            $file_sql = "select * from file where file_id = '$v[3]'";
            $file_res = mysqli_query($con, $file_sql);
            $f = mysqli_fetch_array($file_res);
            $user_sql = "select * from user where u_id = '$v[2]' limit 1";
            $user_res= mysqli_query($con, $user_sql);
            $user= mysqli_fetch_array($user_res);
            ?>
            <tr>
            <td>
                    To <?php echo $user[1]; ?>
                </td>
                <td><a href="http://localhost/cloud/open.php?filename=<?php echo $f[0]; ?>&&type=<?php echo $f[3]; ?>">
                        <?php echo $f[2]; ?></a>
                </td>
                <td>
                    <?php echo mime2ext($f[3]); ?> file
                </td>
                <td>
                    <?php echo round($f[4] / 1000000, 4); ?>MB
                </td>
               
            </tr>
        <?php endforeach;
        echo "</table>";
    } else {
        echo "<h1>No file</h1>";
    }
}

function recivedDisp($uid)
{
    global $con;

    $sql = "select * from share where receiver_id='$uid'";
    $result = mysqli_query($con, $sql);
    $share = mysqli_fetch_all($result);
    if (!empty($share)) {
        // echo "<pre>";
        // print_r($share);
        // echo "</pre>";
         echo "<table>";
        foreach ($share as $sh => $v):
            $file_sql = "select * from file where file_id = '$v[3]'";
            $file_res = mysqli_query($con, $file_sql);
            $f = mysqli_fetch_array($file_res);
            $user_sql = "select * from user where u_id = '$v[1]' limit 1";
            $user_res= mysqli_query($con, $user_sql);
            $user= mysqli_fetch_array($user_res);
            ?>
            <tr>
            <td>
                    From <?php echo $user[1]; ?>
                </td>
                <td><a href="http://localhost/cloud/open.php?filename=<?php echo $f[0]; ?>&&type=<?php echo $f[3]; ?>">
                        <?php echo $f[2]; ?></a>
                </td>
                <td>
                    <?php echo mime2ext($f[3]); ?> file
                </td>
                <td>
                    <?php echo round($f[4] / 1000000, 4); ?>MB
                </td>
               
            </tr>
        <?php endforeach;
        echo "</table>";
    } else {
        echo "<h1>No file</h1>";
    }
}
?>