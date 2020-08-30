<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "dbcon.php";
     $log_pass=$_POST['password'];
     $log_name=$_POST['username'];
     $sql="SELECT * FROM `signup` WHERE si_user='$log_name'";
     $result=mysqli_query($con,$sql);
     $numr=mysqli_num_rows($result);
     if($numr==1){
         $row=mysqli_fetch_assoc($result);
         if(password_verify($log_pass,$row['si_pass'])){
             session_start();
             $_SESSION['loggedin']=true;
             $_SESSION['username']=$log_name;
             header('Location:/p2/politics.php?page=1&login=true');
             exit(); 
         }
         
     }
     header('Location:/p2/politics.php?page=1&login=false'); 
     
}

?>