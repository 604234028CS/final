<?php 
    require 'header2.php';
    require 'config/db.php';
    $mid=$_SESSION["id"];
    
     
    // Check if image file is a actual image or fake image
    if(isset($_POST['add'])){
        
        // 
    $product = $_POST['product'];
    $pictur =  $_FILES["filUpload"]["name"];
    $idproduct = $_POST['idproduct'];
    $brand = $_POST['brand'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $status = $_POST['status'];

   
    $sql = "INSERT INTO product(procduct_id,product_name,product_brand,product_company,product_add,mem_id,status,img) 
            VALUES ('$idproduct','$product ','$brand','$company','$address','$mid','$status','$pictur')";
    $statement = $connection->prepare($sql);
    $statement->execute();
    move_uploaded_file($_FILES["filUpload"]["tmp_name"],"img/".$_FILES["filUpload"]["name"]);
   
    }



?>


<div>
    <title>ขอนุญาติ</title>
    <div class="container mt-5">
        <div class="card-header">
           <h2>ขอนุญาติฮาลาล</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" >
            <div class="form-group">
            <label for="exampleFormControlFile1">Example file input:</label>
            <input type="file" name ="filUpload"  required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">ชื่อสินค้า</label>
            <input type="text" class="form-control-file" name ="product" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">รหัสสินค้า</label>
            <input type="text" class="form-control-file" name ="idproduct" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">ชื่อแบรนด์</label>
            <input type="text" class="form-control-file" name ="brand" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">บริษัท</label>
            <input type="text" class="form-control-file" name ="company" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">ที่อยู่</label>
            <input type="text" class="form-control-file" name ="address" required>
        </div>
            <input type="hidden" class="form-control-file" name ="status" value="กำลังตรวจสอบ">
            <input type="submit" name ="add" value="ขออนุญาติฮาลาล">
            </form>
        </div>
    </div>
</div>


