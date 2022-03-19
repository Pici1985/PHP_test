<?php

session_start();

if(!isset($_SESSION["username"]))
{
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <a href="index.php">Home</a>
        <h1>Admin homepage</h1>
        <h2>Welcome: <?php echo $_SESSION["username"] ?> </h2>
        <a href="logout.php">Logout</a>
    </body>
</html>