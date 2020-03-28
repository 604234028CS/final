<?php 
    require 'header2.php';  
    require 'config/db.php';
        
    $sql = "SELECT * From product where status ='อนุมัติ'";
    $stm = $connection->prepare($sql);
    $stm->execute();
    $show = $stm->fetchAll(PDO::FETCH_ASSOC);
?>



<div>
    <title>Product</title>
    <div class="container">
    <?php foreach($show as $get): ?>
    <center>
    <div class="card" style="width:400px">  
    <div class="card-body">
      <h4 class="card-title"><b><?= $get['product_name']; ?></b></h4>
      <p class="card-text">รหัสสินค้า : <?= $get['procduct_id']; ?></p>
      <p class="card-text">ชื่อแบรนด์ : <?= $get['product_brand']; ?></p>
      <p class="card-text">บริษัท : <?= $get['product_company']; ?></p>
      <p class="card-text">ที่อยู่ : <?= $get['product_add']; ?></p>
    </div>
    <img class="card-img-bottom" src="/halalnew/img/<?= $get['img']; ?>" alt="Card image" style="width:100%">
    <a href="dele.php?pid=<?= $get['procduct_id']; ?>" class ="btn btn-danger">ลบ</a>
  </div>
  
</div>
</center>
<?php endforeach; ?>
    </div>
</div>