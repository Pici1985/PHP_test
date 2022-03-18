<?php

// import statement
include 'connect.php';

// get id from (this is set on the update button in display.php)
$id = $_GET['updateid'];

// query
$sql = "Select * from `crud` where id=$id";

// execute query on connection 
$result = mysqli_query($con, $sql);

// fetch row with query
$row = mysqli_fetch_assoc($result);

// set variables with data from row
$name = $row['name'];
$email = $row['email'];
$password = $row['password'];

// if submit is set to postmethod
if(isset($_POST['submit'])){
    // create variables from input field values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];   

    //query to update data wher id is the selected id 
    $sql = "update `crud` set id=$id, name='$name', email='$email', password='$password' where id=$id";
    // execute query on connection
    $result = mysqli_query($con, $sql);

    // if it is successful redirect else throw error
    if($result){
        echo "Updated successfully";
        // ez a redirect amit kerestem :)
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
    <title>PHP test | Update</title>
</head>
<body>
    <?php
        
        include 'navbar.php';

    ?>

    <div class="container my-5" style="min-height: 80vh;">

    <h1 class="my-5">Update</h1>
    
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" 
            placeholder="Enter your Name" 
            name="name" autocomplete="off" value=<?php echo $name; ?>>
            <!-- this is to set inputfield value to the values fetched from database -->
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" 
            placeholder="Enter your Email Address" 
            name="email" autocomplete="off" value=<?php echo $email; ?>>
            <!-- this is to set inputfield value to the values fetched from database -->
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="name" aria-describedby="passwordHelp" 
            placeholder="Enter your password" 
            name="password" autocomplete="off" value=<?php echo $password; ?>>
            <!-- this is to set inputfield value to the values fetched from database -->
        </div>
        
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
        <button class="btn btn-danger" name="submit"><a class="text-light" href="display.php"> Cancel </a></button>
    </form>
    

    </div>
    <?php
    
    include 'footer.php';

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>















