<?php 

include '../public/head.php';
include '../public/navbar.php';

include '../App/confige.php';
include '../App/function.php';
auth();

if(isset($_GET['edit'])){
$editid = $_GET['edit'];
$seledit = "select * from `department` where id =$editid";
$selquery = mysqli_query($conn ,$seledit );
$sss = mysqli_fetch_assoc($selquery);
$editdeptname =  $sss['name'] ;
$editdeptid =  $sss['id'] ;
$editdeptcreate =  $sss['created-at'] ;

if(isset($_POST['update'])){
$deptname =$_POST['dept-name1'] ;
echo $deptname ;
$update = "UPDATE `department` SET  name = '$deptname'   where id = $editid ";
$u = mysqli_query($conn , $update);
path('department/list.php');
}
}


?>

<h1 class="text-center text-success  pt-5 mt-5" >Edit Department Page</h1>

<div class="container mt-4 col-md-6">
<div class="card bg-dark">
    <div class="card-body">
        <form method="post">
    <div class="form-group">
    <label > Department Name </label>
    <input type="text" name="dept-name1" value="<?=$editdeptname?>" placeholder="dept name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  <button name="update" class="btn btn-info" >  update Department</button>
  </form>
    </div>
</div>
</div>






<?php
include '../public/script.php';
 ?>