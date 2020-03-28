<?php 
    require 'header2.php';
    require 'config/db.php';
//    echo $_SESSION["id"];
//    echo $_SESSION["name"];
//    echo $_SESSION["lastname"];
//    echo $_SESSION["email"]; 
//    echo $_SESSION["password"];
//    echo $_SESSION["sex"];
//    echo $_SESSION["address"];
$mid=$_SESSION["id"]; 
$message ="";
$sql = "SELECT *FROM member where mem_id = $mid";
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetch(PDO::FETCH_ASSOC);

     if(isset($_POST['updateaccount'])){
         $name = $_POST['name'];
         $lastname = $_POST['lastname'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $address = $_POST['address'];
         $sql = "UPDATE member set mem_name='$name',mem_lastname='$lastname',mem_email='$email' ,phonenumber='$phone',address= '$address' ";
         $statement = $connection->prepare($sql);
         $statement->execute();

     }
     elseif(isset($_POST['editpass'])){
        $oldpass = $_POST['passold'];
        $newpass = $_POST['passnew'];
        $conpass = $_POST['confpass'];
         $sql = "SELECT *FROM member where mem_password = $oldpass";
         $statement = $connection->prepare($sql);
        $statement->execute();
         $people = $statement->fetch(PDO::FETCH_ASSOC); 
         if($people===false){
            $message="รหัสผ่านเดิมผิด";
            header("refresh:2;home.php"); 
         }else{
             if($newpass==$conpass){
                $sql = "UPDATE member set mem_password = '$newpass'";
                $statement = $connection->prepare($sql);
                 $statement ->execute();
                $message="เปลี่ยน Password สำเร็จ";
                header("refresh:2;home.php"); 
             }else{
                $message="รหัสผ่านไม่ตรงกัน";
                header("refresh:2;home.php"); 
             }
         }
    }
    
      
    
  
?>

<div>
    <title>Home</title>
        <div class="container mt-3">
            <h2>ข้อมูลสมาชิก</h2>
            <div class="card">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
                <form method="POST">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อ</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="name" value="<?php echo $people['mem_name']; ?>" required>
                </div>
                    <div class="form-group">
                     <label for="exampleInputPassword1">นามสกุล</label>
                     <input type="text" class="form-control"name="lastname" value="<?php echo $people['mem_lastname']; ?>" required>
                 </div>
                 <div class="form-group">
                     <label for="exampleInputPassword1">Email</label>
                     <input type="email" class="form-control" name="email" value="<?php echo $people['mem_email']; ?>" required>
                 </div>
                 <div class="form-group">
                     <label for="exampleInputPassword1">Phone-number</label>
                     <input type="text" class="form-control" name="phone" value="<?php echo$people['phonenumber']; ?>" required>
                 </div>

                 <div class="form-group">
                     <label for="exampleInputPassword1">Address</label>
                     <input type="text" class="form-control" name="address" value="<?php echo $people['address']; ?>"  required>
                 </div>
                     <button type="submit" class="btn btn-primary" name="updateaccount">แก้ไข้ข้อมูลส่วนตัว</button>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                         แก้ไข้รหัสผ่าน
                     </button>
                </div>
                </form>
               
            </div>
        </div>


</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไข้รหัสผ่าน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method ="POST">
  <div class="form-group">
    <label for="exampleInputPassword1">Password เก่า</label>
    <input type="password" class="form-control" name="passold">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password ใหม่</label>
    <input type="password" class="form-control" name="passnew">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm</label>
    <input type="password" class="form-control" name="confpass">
  </div>
  <button type="submit" class="btn btn-primary" name="editpass">ยืนยัน</button>
</form>
      </div>
    </div>
  </div>
</div>
