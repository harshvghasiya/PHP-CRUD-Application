<?php
     $sql="SELECT * FROM `politic` ";
     
?>

<?php
         include "C:xampp\htdocs\p2\dbcon.php";
            $number = count($_POST["name"]);
            echo $number;

            if ( isset($_POST['submit'])){
                for($i = 0; $i < $number; $i++){
                    if(trim($_POST["name"][$i]) != ''){
                        $x=$_POST["name"][$i];
                        echo $x;
                    $sql = "INSERT INTO `tag` (`pol_id`, `tag`) VALUES ('2', '$x')";
                  $result=  mysqli_query($con, $sql);
                  var_dump($result);
                       if ($result) {
                        header("Location:/p2/adminpanle/tag_post.php?added=success");

                       }
                    }else{
                        header("Location:/p2/adminpanle/tag_post.php?added=notsuccess"); 
                    }
                    
                } 
            }
    
?>