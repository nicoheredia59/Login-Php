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
  <?php include 'nav.php' ?>
    <div class="container col col-md4">
    <?php if(!empty($user)): ?>
       <p>Welcome. <h1><?= $user['name']; ?></h1></p>
       <p>Check recent posts</p>
       <?php include('get_posts.php') ?>
       
    <?php endif; ?>
    </div>
<?php include('includes/footer.php') ?>