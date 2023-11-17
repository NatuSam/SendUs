<?php
session_start();
$_SESSION['user']=null;
  //$_SESSION['re']=array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" rel="stylesheet">


    <title>login</title>
</head>

<body>
    <form class="form" autocomplete="off" action="logfunk.php" method="POST">
        <div class="control">
            <h1>
                Sign In
            </h1>
        </div>

        <div class="control block-cube block-input">
            <!-- name -->
            <input id="input" name="username" type="text" placeholder="Username" required></input>
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


        <!-- login -->
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
                Log In
            </div>
        </button>
        <a href="./signup.php">signup</a>
    </form>







    <?php if(isset($_SESSION['error'])){echo $_SESSION['error'];} 
        $_SESSION['error']=null;
    ?>



</body>

</html>