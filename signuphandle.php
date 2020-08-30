<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    include "dbcon.php";
    $user_name=$_POST['username'];
    $user_pass=$_POST['password'];
    $user_cpass=$_POST['cpassword'];
    $sqle="SELECT * FROM `signup` WHERE si_user='$user_name'";
    $result=mysqli_query($con,$sqle);
    $row=mysqli_num_rows($result);
    if ($row >0) {
        $showeroor="user already exist";
    }else{
        if($user_pass==$user_cpass){
           $hash=password_hash($user_pass,PASSWORD_DEFAULT);
           
           $sql="INSERT INTO `signup` (`si_id`, `si_user`, `si_pass`, `si_date`) VALUES (NULL, '$user_name', '$hash', current_timestamp())";
           $results=mysqli_query($con,$sql);
           if ($results) {
            $singup=true;

        
                ?><script>
swal({
    title: "Good job!",
    text: "signup successfully",
    icon: "success",
});
</script>
<?php
            
        

header("Location:/p2/politics.php?page=1&signupsuccess=true");

exit();
}
}else{
$showerror="please enter both password same";
header("Location:/p2/politics.php?page=1&signupsuccess=false");
}
}
header("Location:/p2/politics.php?page=1&signupsuccess=false");
}
?>