<?php

// import statement
include 'connect.php';

// if postmethod is set to submit
if(isset($_POST['submit'])){
    // create variables from input fields? 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];   

    // sql query
    $sql = "insert into `crud` (name,email,password) values ('$name','$email','$password')";
    // result = query to connection 
    $result = mysqli_query($con, $sql);

    // if theres a result redirect else throw error
    if($result){
        // echo "Data inserted successfully";
        // ez a redirect amit kerestem!!! :)
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    
    include 'head.php';
    
    ?>
    <title>CrudOperation</title>
</head>
<body>
    
    <?php
        
        include 'navbar.php';

    ?>

    <div class="container my-5" style="min-height: 80vh;"> 
    
    <h1 class="my-5">Add User</h1>

    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" 
            placeholder="Enter your Name" 
            name="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" 
            placeholder="Enter your Email Address" 
            name="email" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="name" aria-describedby="passwordHelp" 
            placeholder="Enter your password" 
            name="password" autocomplete="off">
        </div>
        
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button class="btn btn-danger" name="submit"><a class="text-light" href="display.php"> Cancel </a></button>

    </form>
    </div>

    <?php
    
    include 'footer.php';

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>















