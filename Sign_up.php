<?php 

    session_start();

    include('includes/session.php');
    require 'db.php';
    

    $message = '';
    
    if(!empty($_POST['user_name']) && ($_POST['name']) && ($_POST['password'])){
        $sql = "INSERT INTO users (user_name, name, password) VALUES (:user_name, :name, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_name' , $_POST['user_name']);
        $stmt->bindParam(':name' , $_POST['name']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if($stmt->execute()){
            $message ="success";
        }else{
            $message = "error";
        }
    }
?>

<?php include('includes/header.php') ?>
    <div class="container">
        <div class="col col-md-4 m-5">
            <div class="form-control">
                <form action="Sign_up.php" method="POST">
                <label for="">Insert your User name:</label>
                <input name="user_name" type="text" class="form-control " />

                <label for="">Insert your name:</label>
                <input name="name" type="text" class="form-control" />

                <label for="">Insert your password:</label>
                <input name="password" type="password" class="form-control" />

                <label for="">Confirm your password:</label>
                <input name="confirm_password" type="password" class="form-control" />

                <button class="btn btn-primary m-3 ">Sign up</button>
                <a href="Login.php">Log in</a>
                </form>
            </div>
            <?php if(!empty($message)): ?>
                <p> <?= $message ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php include('includes/footer.php') ?>