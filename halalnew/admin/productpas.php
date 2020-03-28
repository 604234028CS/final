<?php 
    require 'header2.php';
    require '../config/db.php';
    
    $sql = "SELECT * From product where status ='อนุมัติ'";
    $stm = $connection->prepare($sql);
    $stm->execute();
    $show = $stm->fetchAll(PDO::FETCH_ASSOC);
?> 

<br>
<div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
            <h3>สินค้าผ่านฮาลาล</h3>
            </div>
            <div class="card-body">
            <table class = "table table-bordared">
                    <tr>                      
                        <th><center>รหัสสินค้า</center></th>
                        <th><center>ชื่อสินค้า</center></th>
                        <th><center>ชื่อแบรนด์</center></th>
                        <th><center>บริษัท</center></th>
                        <th><center>ที่อยู่</center></th>
                    </tr>
                    <?php foreach($show as $get): ?>
                    <tr>
                        <td><center><?= $get['procduct_id']; ?></center></td>
                        <td><center><?= $get['product_name']; ?></center></td>
                        <td><center><?= $get['product_brand']; ?></center></td>
                        <td><center><?= $get['product_company']; ?></center></td>
                        <td><center><?= $get['product_add']; ?></center></td>
    
                    </tr>
                    <?php endforeach; ?>

            </div>
        </div>
    </div>

</div>
