<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    
    include 'head.php';
    
    ?>
    <title>PHP test | API</title>
</head>
<body>
    <?php
        
        include 'navbar.php';
        
        ?>

    <div class="container" style="min-height: 80vh;">

    <h1 class="my-5">Data from my Custom little API</h1>

    <table class="table bg-light my-5">
        <thead class="bg-success">
            <tr>
                <th scope="col">Id</th>                
                <th scope="col">Name</th>
                <th scope="col">Age</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    $fields = json_decode(file_get_contents('http://localhost/api/'), TRUE);            
            
                    if(!$fields){
                        echo 'Remote API not running';
                    } else {
                        foreach( $fields as $field):
                            echo '<tr>';
                            echo '<th scope="row">'.$field['id'].'</th>';
                            echo '<td>'.$field['name'].'</td>';
                            echo '<td>'.$field['age'].'</td>';
                            echo '</tr>';
                        endforeach;
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