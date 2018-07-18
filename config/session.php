<?php
include('config.php');
session_start();
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($db,"select cin from Admin where cin = '$user_check' ");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['username'];
$count = mysqli_num_rows($login_session);
if($count!=1){
    $ses_sql2 = mysqli_query($db,"select cin from Client where cin = '$user_check' ");
    $row2 = mysqli_fetch_array($ses_sql2,MYSQLI_ASSOC);
    $login_session = $row2['username'];
    $count2 = mysqli_num_rows($login_session);
    if($count2!=1){
        $ses_sql3 = mysqli_query($db,"select cin from Client where cin = '$user_check' ");
        $row3 = mysqli_fetch_array($ses_sql3,MYSQLI_ASSOC);
        $login_session = $row3['username'];
        $count2 = mysqli_num_rows($login_session);
    }
}

if(!isset($_SESSION['login_user'])){
    header("location: login.php");
}
?>