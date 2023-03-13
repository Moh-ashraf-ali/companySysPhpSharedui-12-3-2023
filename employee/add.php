<?php


include '../public/head.php';
include '../public//navbar.php';



include '../App/confige.php';
include '../App/function.php';
auth();


check($conn , "Connection");
$sel = "SELECT * FROM `department` ";
$SELQUERY = mysqli_query($conn ,$sel );
if(isset($_POST['send'])){
    $empNAME = $_POST['emp-name'];
    $deptnames = $_POST['deptname'];
    $deptsalary= $_POST['emp-salary'];
$imageName = time() . $_FILES['emp-image']['name'];
$imageTmpname = $_FILES['emp-image']['tmp_name'];
$location = "upload/" .$imageName;
move_uploaded_file($imageTmpname , $location );
    $insert = "INSERT INTO  `employee`
 VALUES ( NULL , '$empNAME',' $deptsalary','$imageName', DEFAULT , '$deptnames'  )"  ;
$insertquery =  mysqli_query($conn , $insert );
};



?>


<h1 class="text-center text-success  pt-5" >Add Employee Page</h1>
<div class="container mt-4 col-md-6">
<div class="card bg-dark">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label > Employee Name </label>
    <input type="text" name="emp-name" placeholder="dept name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label > Employee salary </label>
    <input type="number" name="emp-salary" placeholder="emp salary"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label > Employee image </label>
    <input type="file" name="emp-image" placeholder="emp salary"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    
    <div class="form-group">
    <label > Employee department </label>
    <select name="deptname" id=""  class="form-control mb-4">
        <?php foreach ($SELQUERY  as $gata): ?>

<option value="<?= $gata['id']  ?>"   > <?= $gata['name']  ?> </option>
            <?php endforeach ?>
    </select>
  <button name="send" class="btn btn-info" >  Add employee</button>
  </form>
    </div>
</div>
</div>





<?php  



include '../public/script.php';
?>