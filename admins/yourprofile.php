<?php
include '../public/head.php';
include '../public/navbar.php';


include '../App/confige.php';
include '../App/function.php';
auth(2,3);

$idfromsession = $_SESSION['id'];
   
    $selbyid = "SELECT * FROM `adminwithrole` where adminId =$idfromsession";
$ss = mysqli_query($conn , $selbyid) ;
   $row = mysqli_fetch_assoc($ss);
    // check( $selwithimage, "Show your profile");

?>


<div class="container mb-5 mt-4 pt-5 col-md-4">
<h2 class="text-center text-success mb-4  pt-5" >show Admin profile Page</h2>

<div class="card bg-dark">
    <img src="./upload/<?=$row['adminImage'] ?>" class="card-img-top" alt="">
    <div class="card-body">
  <h6 class="text-white">Admin Name :   <?=$row['adminName'] ?></h6> <br>
  <h6 class="text-white">Admin role :   <?=$row['rolesDescription'] ?></h6>  <br>
<a class="btn btn-warning btn-block"  href="editprofile.php"> Edit profile</a>
    </div>
</div>
</div>





<?php  



include '../public/script.php';
?>