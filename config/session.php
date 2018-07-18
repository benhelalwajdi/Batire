<?php
include('config.php');
session_start();
$site=$_SESSION["site"] ;

if(!isset($_SESSION['login_user'])){
    header("location: login.php");
}
?>