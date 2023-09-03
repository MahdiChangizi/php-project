<?php 
 session_start();
 require_once '../functions/helpers.php';

 session_destroy();
 redirect('auth/login.php');
    ?>