<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    
    include 'head.php';
    
    ?>
    <title>PHP test | Home</title>
</head>
<body>
    <?php
    
        include 'navbar.php';

    ?>

    <div class="container">
        <h1 class="text-center mt-5">Landing Page</h1>

        <div class="d-flex">
            <form action="index.php" method="post">
                <input class="btn btn-success m-1" type="submit" name="someAction" value="Appear!!" />
            </form>
            <button class="btn btn-danger m-1" onClick="disappear()">Disappear!!</button>
        </div>
        

        <?php
        
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
            {
                boom();
            }

            function boom()
            {
                echo '<h1 id="boom">Boom!!</h1>';
            }

             
        
        ?>

        <?php
            $fields = json_decode(file_get_contents('https://justfields.com/project/eXrglmyB/json'), TRUE);
            
            foreach( $fields['posts']['post'] as $post):
                echo '<div class="card p-5 my-5">';
                echo '<img src="'.$post['image'].'" />';
                echo '<h1 class="text-center my-5">'.$post['title'].'</h1>'.' '.$post['blogpost'].'<strong>'.$post['author'].'</strong>'.'<br>';
                echo '<br>';
                echo '</div>';
            endforeach;    
            
        ?>
               
    </div>

    <?php
    
    include 'footer.php';

    ?>

    <?php
    
    include 'scripts.php';
    
    ?>
</body>
</html>