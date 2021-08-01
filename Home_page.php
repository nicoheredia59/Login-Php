<?php 
    session_start();


    require 'db.php';

    if(isset($_SESSION['id_user_session'])) {
        $query = $conn->prepare('SELECT id_user, name FROM users WHERE id_user = :id_user');
        $query->bindParam(':id_user', $_SESSION['id_user_session']);
        $query->execute();
        $res = $query->fetch(PDO::FETCH_ASSOC);

        $user = null;

      if (count($res) > 0) {
        $user = $res;
      }
    }
?>

<?php include('includes/header.php') ?>
    <div class="container">
    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['name']; ?>
      <br>You are Successfully Logged In

      
      <a href="make_post.php" class="btn btn-primary" >
       Make a post
      </a>
      <a href="Log_out.php">
        Logout
      </a>
    <?php endif; ?>
    </div>
<?php include('includes/footer.php') ?>