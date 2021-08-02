<?php 
    include 'db.php';
    $message = "";

    $query = "SELECT * FROM posts";
    $stmt = $conn->query($query);


?>


<?php include 'includes/header.php' ?>
    <?php foreach($stmt as $data) 
        {    
    ?>
        <div class="container m-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h3><?php echo $data['title'] ?></h3>
                <p> Content: 
                    <h4>
                        <?php echo $data['content'] ?>
                    </h4> 
                    <a href="delete_post.php?id=<?= $data['id_post']; ?>" class="btn btn-danger">Eliminar</a> 
                    <button class="btn btn-primary">Editar</button> 
                </p>
            </div>
        </div>
        </div>
    <?php }?>
<?php include 'includes/footer.php' ?>



        