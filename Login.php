<?php 

    session_start();
    
    if(isset($_SESSION['id_user_session'])){
        header("Location: /Login-Php/Home_page.php");
    }

    require 'db.php';

    if(!empty($_POST['user_name']) && !empty($_POST['password'])){
        $query = $conn -> prepare("SELECT * FROM users WHERE user_name = :user_name");
        $query->bindParam(':user_name', $_POST['user_name']);
        $query->execute();
        $res = $query->fetch(PDO:: FETCH_ASSOC);

        $message = '';

        if(count($res) > 0 && password_verify($_POST['password'], $res['password'])){
            $_SESSION['id_user_session'] = $res['id_user'];
            header("Location: /Login-Php/Home_page.php");
        }else{
            $message = "error";
        }
    }

?>

<?php include('includes/header.php') ?>
    <div class="container">
        <div class="col col-md-4 m-5">
            <div class="form-control">
                <form action="Login.php" method="POST">
                    <label for="">Insert your User name:</label>
                    <input name="user_name" type="text" class="form-control " />

                    <label for="">Insert your password:</label>
                    <input name="password" type="password" class="form-control" />
                    <input class="btn btn-primary" type="submit" value="Log in" />
                    <a href="Sign_up.php" class="btn btn-primary m-3">Sign up</a>
                </form>
                
            </div>
            <?php if(!empty($message)): ?>
                <p> <?= $message ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php include('includes/footer.php') ?>