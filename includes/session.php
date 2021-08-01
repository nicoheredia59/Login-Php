<?php

if(isset($_SESSION['id_user_session'])){
    header("Location: /Login-Php/Home_page.php");
}