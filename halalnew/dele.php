<?php
require 'config/db.php';
// $pin = $_POST['pin'];
$pid = $_GET['pid'];

// echo $pin;
$sql = "DELETE FROM product WHERE procduct_id='$pid'";
$statement = $connection->prepare($sql);
$statement->execute();
header("refresh:2;product.php"); 
// if () {
//     echo "<script>";
//     echo "alert('บัญชีถูกลบสำเร็จ')";
//      echo "</script>";
//     header("refresh:1;bankAccount.php");
// }else{
//     echo "<script>";
//     echo "alert('ตรวจสอบเลขบัญชี หรือ pin ให้ถูกต้อง')";
//      echo "</script>";
//     header("refresh:1;bankAccount.php"); 
//  }
?>