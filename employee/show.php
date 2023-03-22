<?php


include '../public/head.php';
include '../public//navbar.php';



include '../App/confige.php';
include '../App/function.php';
auth(2);
if(isset($_GET['show'])){

    $id = $_GET['show'];
    $selbyid = "SELECT * FROM  `empwithdept` where empId =$id";
    $selwithimage = mysqli_query($conn , $selbyid);
    $row = mysqli_fetch_assoc($selwithimage);
    check($insertquery, "Show");

}
?>


<div class="container mb-5 mt-4 pt-5 col-md-4">
<h1 class="text-center text-success  pt-5" >show Employee Page</h1>

<div class="card bg-dark">
    <img src="./upload/<?=$row['empImage'] ?>" class="card-img-top" alt="">
    <div class="card-body">
  <h6 class="text-white">  Employee Id :   <?=$row['empId'] ?> </h6> <br>
  <h6 class="text-white">Employee Name :   <?=$row['empName'] ?></h6> <br>
  <h6 class="text-white">Employee salary :   <?=$row['empSalary'] ?></h6>  <br>
  <h6 class="text-white">Employee department :   <?=$row['deptName'] ?> </h6> <br>
<a class="btn btn-info"  href="list.php"> Go Back</a>
    </div>
</div>
</div>





<?php  



include '../public/script.php';
?>