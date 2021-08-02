<?php
    include 'db.php';
    
        $id = $_GET['id_post'];
        $query = "DELETE FROM posts WHERE id_post = :id_post";
        $stmt = $conn->prepare($query);
        if ($stmt->execute([':id_post' => $id_post])) {
            echo "success";
        }else{
            echo "err";
        }



?>