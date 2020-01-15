<?php
session_start();
if(isset($_SESSION['s_pass'])){
    unset($_SESSION['s_pass']);
    header('location:supplier_login.php');
}

?>