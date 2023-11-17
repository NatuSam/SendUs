<?php
session_start();
if (empty($_SESSION['user']['u_id'])) {
    header("Location: login.php");
}
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

    <link href="./home.css" rel="stylesheet">
    <link href="./s.css" rel="stylesheet">

    <title>home</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="home.php"><img src="./Profiles/<?php echo $_SESSION['user']['profile']; ?>" style="background-position: center center; margin-left:40px; width:50%;
                border-radius: 50%; border: 2px solid rgb(255, 255, 255);"></img></a>
            <ul>
                <li><a href="home.php" onclick=""><i class="item item_Cloud"></i>Mycloud</a></li>
                <li><a href="sharepage.php" onclick=""><i class="item item_Share"></i>Sharedfiles</a></li>
                <li class="logout"><a href="login.php" name="logout">logout</a></li>
            </ul>

        </div>
        <div class="main_content">
            <div class="header">Cloud Storage</div>
            <div class="info">

                <div class="disp">
                    <div>
                        <div class="wrap">
                            <div class="search">
                                <form action="search.php" method="POST" autocomplete="off" style="  display: flex;">
                                    <input type="text" name="search" class="searchTerm"
                                        placeholder="What are you looking for?" style="width:100%; opacity:100%;"
                                        required>
                                    <button type="submit" class="searchButton">
                                        <img src="./icons/search.png" class="searchIcon">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php 
                     if(isset($_SESSION['search'])){
                        @searchDisp($_SESSION['search']);
                        $_SESSION['search']=null;
                    }
                     else{fileDisp($_SESSION['user']['u_id']); }
                     ?>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;flex-direction:column;">
                    <div>
                        <div>
                            <div class="custom-file">

                                <form class="upbox" action="upload.php" method="post" enctype="multipart/form-data">
                                    <h6> </h6>
                                    <span> </span>

                                    <input type="file" class="custom-file-input" id="customFile" name="file" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <button name="submit">submit</button>
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