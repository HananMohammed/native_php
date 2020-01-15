<?php 
session_start();
if(isset($_SESSION['s_pass'])){
    unset($_SESSION['s_pass']);
    header('location:login.php');
}
//mysqli_real_escape_string($con,$id);used to make security on input data
?>