<?php 
    require 'css/header.php';
    require 'config/db.php';
    $message = "";
    if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['sex']) && isset($_POST['pass'])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $sex = $_POST['sex'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $status = $_POST['status'];
        $address = $_POST['address'];

        $sql3 = 'INSERT INTO member(mem_name, mem_lastname, mem_sex, mem_email, phonenumber, mem_password, status,address) values(:name,:lastname,:sex,:email,:phonenumber,:pass,:status,:address)';
    $statment = $connection->prepare($sql3);
    if($statment->execute([':name'=> $name,':lastname'=>$lastname,':sex'=>$sex,':email'=>$email,':phonenumber'=>$phone,':pass'=>$pass,':status'=>$status,':address'=>$address])) {
        $message = "ลงทะเบียนสำเร็จ";
        header("refresh:2;index.php"); 
    }else{
        echo "Error someting";
    }



}

?>


<div>
        <title>ลงทะเบียน</title>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                 <h2>ลงทะเบียน</h2>   
            </div>
            <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
                <form method="POST">   
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">ชื่อ</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">นามสกุล</label>
      <input type="text" class="form-control" name="lastname">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">ที่อยู่</label>
    <input type="text" class="form-control" name="address" >
  </div>
  <div class="form-group">
    <label for="inputAddress">Email</label>
    <input type="email" class="form-control" name="email" >
  </div>
  <div class="form-group">
    <label for="inputAddress2">เบอร์ติดต่อ</label>
    <input type="text" class="form-control" name="phone">
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">เพศ</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sex" value="ชาย"  checked>
          <label class="form-check-label" for="gridRadios1">
            ชาย
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" value ="หญิง" name="sex"  >
          <label class="form-check-label" for="gridRadios2">
            หญิง
          </label>
        </div>
      </div>
    </div>
  </fieldset>
    <div class="form-group">
    <label for="inputAddress2">Password</label>
    <input type="password" class="form-control" name="pass">
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" name="status" value ="สมาชิก">
  </div>
  <button type="submit" class="btn btn-primary">ลงทะเบียน</button>

                </form>
            </div>
        </div>
    </div>

</div>