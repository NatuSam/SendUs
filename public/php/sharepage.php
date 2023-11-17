<?php
session_start();
if (empty($_SESSION['user']['u_id'])) {
    header("Location: login.php");
}
require("share.php");
require("display.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function clickE(btn) {
        const get = document.getElementById(btn);
        get.click();
    }
    </script>

    <link href="./share.css" rel="stylesheet">
    <link href="./s.css" rel="stylesheet">

    <title>Share</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="home.php"><img src="./Profiles/<?php echo $_SESSION['user']['profile']; ?>" style="background-position: center center; margin-left:40px; width:50%;
                border-radius: 50%; border: 2px solid rgb(255, 255, 255);"></img></a>
            <ul>
                <li><a href="home.php" onclick=""><i class="item item_Cloud"></i>Mycloud</a></li>
                <li><a href="#" onclick=""><i class="item item_Share"></i>Sharedfiles</a></li>
              
                <li class="logout"><a href="login.php" name="logout">logout</a></li>
            </ul>

        </div>
        <div class="main_content">
            <div class="header">Share file</div>
            <div class="info">

                <div class="disp">
                    <div>
                        <div class="wrap">
                            <h1>Recived</h1>
                        </div>
                    </div>
                    <div>
                    
                        <?php recivedDisp($_SESSION['user']['u_id']);?>
                    </div>
                    <div>
                        <div class="wrap">
                            <h1>Sent</h1>
                        </div>
                    </div>
                    <div>
                        <!-- Center  -->
                        <?php shareDisp($_SESSION['user']['u_id']); ?>
                    </div>

                </div>
                <div style="display:flex;justify-content:space-between;flex-direction:column;">
                    <div>
                        <div>
                            <div class="custom-file">

                                <form class="upbox" method="post" enctype="multipart/form-data">
                                    <label for="fname">username</label>
                                    <input type="text" name="username" placeholder="to user" required>
                                    <label for="fname">file</label>
                                    <input type="text" name="file" id="" placeholder="send file"
                                        style="  margin-bottom: 80px; " required>
                                    <?php if(isset($_POST['share'])){
                                         share($_SESSION['user']['u_id'],$_POST['username'],$_POST['file']);
                                        }?>
                                    <button name="share">send</button>
                                </form>

                            </div>

                        </div>
                        <div>
                        </div>
                    </div>
                    <div style="margin-top:230px;margin-left:20px;">

                        <?php strDisp($_SESSION['user']['u_id']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>