<header class="tm-header  bg-gradient-dark" id="tm-header">
    <div class="tm-header-wrapper">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="tm-site-header">
            <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>
            <h1 class="text-center text-light">XBlog</h1>
        </div>
        <nav class="tm-nav" id="tm-nav">
            <ul>
                <li class="tm-nav-item active"><a href="politics.php?page=1" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Home
                    </a></li>

                <li class="dropdown  tm-nav-item ">
                <li class="tm-nav-item" data-toggle="dropdown"><a href="#" class="tm-nav-link">
                        <i class="fas fa-pen"></i>
                        Catagories &nbsp <i class="fas fa-caret-down"></i>
                    </a></li>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <?php
                 $sqli="SELECT DISTINCT pol_cat FROM `politic`";
                 $result=mysqli_query($con,$sqli);
                 while ($row=mysqli_fetch_assoc($result)) {
                    $pol_cat=$row['pol_cat']; 
                    echo ' <a class="dropdown-item" href="catagories.php?catagory='.$pol_cat.'">'.$pol_cat.'</a>';
                 }
                 ?>
                </div>
                </li>


                <li class="tm-nav-item"><a href="about.php" class="tm-nav-link">
                        <i class="fas fa-users"></i>
                        About
                    </a></li>
                <li class="tm-nav-item"><a href="contact.php" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Contact Us
                    </a></li>
                <?php
                    $login=false;                   
    if((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin']==true)){
        $login=true;
      echo'
      <li class="tm-nav-item " ><a href="logout.php" class="tm-nav-link">
      <i class="fas fa-sign-out-alt"></i>
      Logout
  </a></li>
  <h3 class="text-light px-3">Welcome '.$_SESSION['username'].'</h3> '; 
  
  /*   if($login){
     ?><script>
                swal({
                    title: "Good job!",
                    text: "Login successfully",
                    icon: "success",
                });
                </script>
                <?php
          }  */
          
    }
    else {
    
        echo '  <li class="tm-nav-item " data-toggle="modal" data-target="#exampleModal"><a class="tm-nav-link">
        <i class="fas fa-sign-in-alt"></i>
        Login
    </a></li>
<li class="tm-nav-item" data-toggle="modal" data-target="#signupModal"><a class="tm-nav-link">
        <i class="fa fa-user"></i>
        Sing UP
    </a></li>';
    }
    ?>
            </ul>
        </nav>


    </div>
</header>