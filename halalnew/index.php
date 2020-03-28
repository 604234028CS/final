<?php 
    require 'css/header.php';    
?>


<div>
    <title>Index</title>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>เข้าสู่ระบบ</h2>            
            </div>
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
            <form method="GET" action="login.php">
            <div class="form-group">
                 <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                
            </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="pass">
                <a href="register.php"><small id="emailHelp" class="form-text text-muted">สมัครสมาชิก</small></a>
            </div>

        <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
            </form>
            </div>
        </div>
    </div>

</div>