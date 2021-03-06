<?php

    require 'db.php';

    include 'includes/session.php'; 

    $message = "";

    if( !empty($_POST['content']) ){
        $sql = "INSERT INTO posts (title, content) VALUES (:title,:content)";
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(':title', $_POST['title']);
         $stmt->bindParam(':content', $_POST['content']);
         if($stmt->execute()){
             $message = "success";
         }else {
             $message = "error";
         }
    } 
?>


<?php include('includes/header.php') ?>
<?php include('nav.php') ?>
<div class="container">
        <div class="col col-md-4 m-5">
            <div class="form-control">
                <form action="make_post.php" method="POST">

                <label for="">Insert Title:</label>
                <input name="title" type="text" class="form-control" />

                <label for="">Create a post:</label>
                <input name="content" type="text" class="form-control" />

                <input name="submit" value="Ingresar" type="submit" class="btn btn-primary m-5" />

                <a href="/Login-php/Home_page.php" >Volver</a>
                </form>
            </div>
            <?php if(!empty($message)): ?>
                <p> <?= $message ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php include('includes/footer.php') ?>