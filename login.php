<?php

ini_set('display_errors', '0');

$host = "localhost";
$user = "root";
$password = "";
$db = "users";

session_start();

$data = mysqli_connect($host,$user,$password,$db);

if($data === false)
{
    die("Conenction error."); 
} 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from login where username = '".$username."' AND password = '".$password."'"; 

    $result = mysqli_query($data,$sql);

    $row = mysqli_fetch_array($result);
  
    switch ($row["usertype"]){
        case "user":
          $_SESSION["username"] = $username;  
          echo "user";
          header("location:userhome.php");
          break;
        case "admin":
          echo "admin";
          $_SESSION["username"] = $username;  
          header("location:adminhome.php");
          break;  
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    
    include 'head.php';
    
    ?>
    <title>Login</title>
</head>
<body>
    <?php
    
    include 'navbar.php'
    
    ?>

    <div class="container" style="min-height: 80vh;">
        <form action="#" method="POST" class="card p-3 my-5 m-auto" style="width: 50vw;">
            <h2 class="mb-3">Login</h2>
            <div class="form-floating mb-3">
                <input type="text" 
                       class="form-control"
                       id="floatingInput"
                       placeholder="Username"
                       name="username"
                       autocomplete="false"
                       required
                       >
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password"
                       class="form-control"
                       id="floatingPassword" 
                       placeholder="Password"
                       name="password"
                       autocomplete="false"
                       required
                       >
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid">
                <input class="btn btn-primary mt-3" type="submit" value="Login" data-bs-toggle="modal" data-bs-target="#staticBackdrop">                
                <p class="text-center my-1">No account yet??</p>
                <a class="text-center my-1" href="register.php">Register one</a>
            </div>

        </form>
       
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="staticBackdropLabel">Error</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span>Username or password incorrect.</span>
                </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    
    include 'footer.php';
    include 'scripts.php';

    ?>
    
</body>
</html>