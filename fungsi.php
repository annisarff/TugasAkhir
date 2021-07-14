<?php 
    session_start();
        include_once "koneksi.php";
        $email=$_POST['email'];
        $password=$_POST['password'];
        if ($sql="select * from admin where email='$email' AND password = $password"){
        $rs=mysqli_query($conn,$sql);
        $rec=mysqli_fetch_assoc($rs);
        if($rec){
            unset($_SESSION['error']);
            $_SESSION['user']=$rec;
                header("location:admin.php");
        }else{
            $_SESSION['error']=true;
            header("location:admin.php");
        }  
        


?>