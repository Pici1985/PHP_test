<?php

// import statement
include 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    
    include 'head.php';

    ?>
    <title>PHP test | Display</title>
</head>
<body>

    <?php
        
        include 'navbar.php';

    ?>
        
    
    <div class="container my-5" style="min-height: 80vh;">
        <h1 class="my-5"> Display Page</h1>

        <button class="btn btn-primary"><a href="user.php" class="text-light">Add user</a></button>  
        
        <table class="table bg-light my-5">
            <thead>
                <tr class="bg-success">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <!-- dynamically created table  -->
                <?php
                    // query to select everything from database
                    $sql = "Select * from `crud`";
                    // execute query
                    $result = mysqli_query($con, $sql); 

                    // if there is a result
                    if($result){
                        // loop as long as there are results
                        while($row = mysqli_fetch_assoc($result)){
                            // create variables from row data 
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $password = $row['password'];
                            // echo a table row html with dynamic values from database
                            echo '
                            <tr>
                                <th scope="row">'.$id.'</th>
                                <td>'.$name.'</td>
                                <td>'.$email.'</td>
                                <td>'.$password.'</td>
                                <td>
                                    <button class="btn btn-success"><a class="text-light" href="update.php?updateid='.$id.'">Update</a></button>        
                                    <button class="btn btn-danger"><a class="text-dark" href="delete.php?deleteid='.$id.'">Delete</a></button>        
                                </td>
                            </tr> 
                            ';
                        }
                    }
                ?>   
            </tbody>
        </table>

</div>

    <?php

    include 'footer.php';

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

