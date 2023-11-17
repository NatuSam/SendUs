<?php
session_start();
$_SESSION['user']['user_name']=null;
  //$_SESSION['re']=array();
?>
<!DOCTYPE html>
<html>
<link href="login.css" rel="stylesheet">

  <body>
  <form class="form" autocomplete="off" action="logfunk.php" method="POST" enctype="multipart/form-data">
        <div class="control">
            <h1>
                Sign Up
            </h1>
        </div>

        <div class="control block-cube block-input">
            <!-- name -->
            <input id="input" name="nwusername" type="text" placeholder="username" required></input>
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>
            <div class="bg">
                <div class="bg-inner"></div>
            </div>
        </div>
        <div class="control block-cube block-input">
            <!-- name -->
            <input id="input" name="email" type="email" placeholder="email" required></input>
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>
            <div class="bg">
                <div class="bg-inner"></div>
            </div>
        </div>
        <div class="control block-cube block-input">
            <!-- password -->
            <input id="input" name="password" type="password" placeholder="Password" required></input>
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>

            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>

            <div class="bg">
                <div class="bg-inner"></div>
            </div>

        </div>
        <div class="control block-cube block-input">
            <!-- password -->
            <input type="file" name="profile" accept="image/png, image/jpeg"  required>
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>

            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>

            <div class="bg">
                <div class="bg-inner"></div>
            </div>

        </div>


        <!-- Sin Up -->
        <button class="btn block-cube block-cube-hover">
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>
            <div class="bg">
                <div class="bg-inner"></div>
            </div>

            <div class="text">
                Sign Up
            </div>
        </button>
        <?php if(isset($_SESSION['error'])){echo $_SESSION['error'];} 
                         $_SESSION['error']=null;
                         ?>
    </form>

</body>
</html>
