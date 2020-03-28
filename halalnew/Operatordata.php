<?php 
    require 'header2.php';
    require 'config/db.php';
    $mid=$_SESSION["id"]; 
     $sql = "SELECT *FROM operator where mem_id = $mid";
     $statement = $connection->prepare($sql);
     $statement->execute();
     $people = $statement->fetch(PDO::FETCH_ASSOC);
  
     if( isset($_POST['name']) && isset($_POST['numid']) && isset($_POST['address'])){
       
        $img= $_FILES["img"]["name"];
         $name= $_POST['name'];
         $numid= $_POST['numid'];
         $address =$_POST['address'];
        
        //  $sql = "SELECT * FROM member where mem_id = $mid";
        //  $statement = $connection->prepare($sql);
        //  $statement->execute();
        //  $people = $statement->fetch(PDO::FETCH_ASSOC);

         $sql1 = "INSERT into operator(op_com, op_idcard, address, mem_id, logo) value ('$name','$numid','$address','$mid','$img')";
         $statement = $connection->prepare($sql1);
         $statement->execute();
         move_uploaded_file($_FILES["img"]["tmp_name"],"img/".$_FILES["img"]["name"]);
         header("refresh:2;Operatordata.php"); 
     } 
?>


<div>
        <title>ข้อมูลผู้ประกอบการ</title>
        <div class="container mt-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            เพิ่มข้อมูล
        </button>
            <div class="card">
                <div class="card-header">
                    <h2>ข้อมูลผู้ประกอบการ</h2>
                </div>  
                <center>
                <div class="card" style="width:400px">
                 <div class="card-body">
                <img src="/halalnew/img/<?php echo $people['logo'];?>"  width=400 height="200">
                <label ><b>ชื่อสถาประกอบการ/บริษัท/บุคคล</b></label><br>
                <label ><?php echo $people['op_com'];?></label><br>
                <label ><b>หมายเลขจดทะเบียน/หมายเลขบัตรประชาชน</b></label><br>
                <label ><?php echo $people['op_idcard'];?></label><br>
                <label ><b>ตำแหน่งที่ตั้ง</b></label><br>
                <label ><?php echo $people['address'];?></label>
                </div>
                </center>          
            </div>
        </div>
       
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ข้อมูลผู้ประกอบการ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="card-body">
                    <form method ="POST" enctype="multipart/form-data">
                         <div class="form-group">
                             <label for="exampleFormControlFile1">Example file input</label>
                             <input type="file" class="form-control-file" name ="img" required>
                        </div>
                             <div class="form-group">
                                    <label for="exampleInputPassword1">ชื่อสถาประกอบการ/บริษัท/บุคคล</label>
                                     <input type="text" class="form-control" name="name" required>
                             </div>
                             <div class="form-group">
                                    <label for="exampleInputPassword1">หมายเลขจดทะเบียน/หมายเลขบัตรประชาชน</label>
                                     <input type="text" class="form-control" name="numid" required>
                             </div>
                             <div class="form-group">
                                    <label for="exampleInputPassword1">ที่ตั้ง</label>
                                     <input type="text" class="form-control" name ="address" required>
                             </div>
                     <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>