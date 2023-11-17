<?php session_start();
if(empty($_SESSION['user']['u_id'])){
    header("Location: login.php");
    }
?>
<html>
    <head>
        
    </head>
    <body>
        <img src="./Profiles/<?php echo $_SESSION['user']['profile'];?>" alt="" width="10%">
        <h1>User Name <?php echo $_SESSION['user']['user_name']; ?></h1>
        <form action="upload.php" method="post"  enctype="multipart/form-data">
            <input type="file" name="file" required>
            <button name="submit">submit</button>
        </form>
        <form action="display.php" method="post">
            <button>GO</button>
        </form>
      <?php require("display.php");?>  

      
    </body>
</html>


