<?php 
    require '../config/db.php';

    $pid = $_GET['pid'];
    
    $sql = "UPDATE product set status ='อนุมัติ' where procduct_id=$pid";
    $stm = $connection->prepare($sql);
    $stm->execute();
    header("refresh:2;reque.php"); 
?>
