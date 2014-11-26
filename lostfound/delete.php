<?php
session_start();
include("check2.php");
$user = new User();
$user1= new ticket();
$uid = $_SESSION['uid'];
$name = $_POST['category'];
$tkt_id = $_POST['id'];
$tkt_bit = $_POST['r_type'];
$user1->delete_ticket($name,$tkt_id,$uid,$tkt_bit);
?>

