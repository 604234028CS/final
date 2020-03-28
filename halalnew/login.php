<?php 
    require 'config/db.php';
   
    session_start();                    
    if(isset($_GET['email']) && isset($_GET['pass'])){
        $user = $_GET['email'];
        $pass = $_GET['pass'];

        $sql = "SELECT * FROM member WHERE mem_email = :email and mem_password = :pass";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':email', $user);
        $statement->bindValue(':pass', $pass);
        $statement->execute();
        $people = $statement->fetch(PDO::FETCH_ASSOC);
        // echo $people['mem_name'];
        if($people === false){
            echo "<script>";
            echo "alert('รหัสผิด')";
             echo "</script>";
            header("refresh:1;index.php"); 
        }
        else{
              
                if($people['status']=='สมาชิก'){
                    $mid = $people['mem_id'];
                    $sql2 = 'SELECT * FROM member where mem_id=:mid';
                    $statement = $connection->prepare($sql2);
                    $statement->execute([':mid'=>$mid]);
                    $person = $statement->fetch(PDO::FETCH_ASSOC);
                   
                        $_SESSION["id"] = $person['mem_id'];
                        $_SESSION["name"] = $person['mem_name'];
                        $_SESSION["lastname"] = $person['mem_lastname'];
                        $_SESSION["email"] = $person['mem_email'];
                        $_SESSION["password"] = $person['mem_password'];
                        $_SESSION["sex"] = $person['mem_sex'];
                        $_SESSION["address"] = $person['address'];
                        echo "ผู้ใช้";
                    header('Location:home.php');
                   
                    }
                    if($people['status']=='ผู้ออกฮาลาล'){
                        $mid = $people['mem_id'];
                        $sql2 = 'SELECT * FROM member where mem_id=:mid';
                        $statement = $connection->prepare($sql2);
                        $statement->execute([':mid'=>$mid]);
                        $person = $statement->fetch(PDO::FETCH_ASSOC);
                        $_SESSION["id"] = $person['mem_id'];
                        header('Location:admin/index.php');
                    }
        }
            
    } else{   
        session_destroy();
        header('Location:index.php');
    }
    
      
    

?>