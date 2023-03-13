<?php


include '/xampp/htdocs/sharedui/public/head.php';
include '/xampp/htdocs/sharedui/public/navbar.php';



include '../App/confige.php';
include '../App/function.php';

auth();
check($conn , "Connection");


if(isset($_POST['send'])){
    $DEPTNAME = $_POST['dept-name'];
    $insert = "INSERT INTO  `department`
 VALUES ( NULL , '$DEPTNAME', DEFAULT  )"  ;
$insertquery =  mysqli_query($conn , $insert );
};



?>


<h1 class="text-center text-success  pt-5" >Add Department Page</h1>
<div class="container mt-4 col-md-6">
<div class="card bg-dark">
    <div class="card-body">
        <form method="post">
    <div class="form-group">
    <label > Department Name </label>
    <input type="text" name="dept-name" placeholder="dept name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  <button name="send" class="btn btn-info" >  Add Department</button>
  </form>
    </div>
</div>
</div>





<?php  



include '../public/script.php';
?>