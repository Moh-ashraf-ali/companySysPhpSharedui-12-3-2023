<?php 

include '../public/head.php';
include '../public/navbar.php';

include '../App/confige.php';
include '../App/function.php';
auth();

if(isset($_GET['edit'])){
$editid = $_GET['edit'];
$seledit = "select * from `employee` where id = $editid";
$selquery = mysqli_query($conn ,$seledit );
$sss = mysqli_fetch_assoc($selquery);
$sel = "SELECT * FROM `department` ";
$SELQUERY = mysqli_query($conn ,$sel );
$sel = "select * from  `empwithdept` where empId =$editid";
$sssssss = mysqli_query($conn , $sel);
$ddd =mysqli_fetch_assoc($sssssss);



if(isset($_POST['update'])){
$empname =$_POST['emp-name'] ;
$empsalary =$_POST['emp-salary'] ;
$empdept =$_POST['deptname1'] ;
if(empty($_FILES['emp-image']['name'])){
  $imageName = $sss['image'];
}else{
  $imageName = time() .$_FILES['emp-image']['name'];
  $imagetmpname = $_FILES['emp-image']['tmp_name'];
  $location = "upload/$imageName";
  move_uploaded_file($imagetmpname , $location);
  unlink("./upload/".$sss['image']);
}


$update = "UPDATE `employee` SET `emp-name`='$empname', `image` = '$imageName' ,`salary`=$empsalary,`dept-id`=$empdept WHERE id = $editid";
 $e = mysqli_query($conn,$update);
header("location:list.php");
}
}

?>

<h1 class="text-center text-success  pt-5 mt-5" >Edit Department Page</h1>

<div class="container mt-4 col-md-6">
<div class="card bg-dark">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
        <div class="form-group">
    <label > Employee Name </label>
    <input type="text" name="emp-name" value="<?=$sss['emp-name'] ?>" placeholder="dept name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label > Employee salary </label>
    <input type="number" name="emp-salary"  value="<?=$sss['salary'] ?>" placeholder="emp salary"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label class="mr-4"  > Employee image  : </label>
    <img width="100px" src="./upload/<?=$sss['image']?>" alt="">
    <input type="file" name="emp-image" placeholder="emp salary"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    
    <div class="form-group">
    <label > Employee department </label>
    <select name="deptname1"  class="form-control mb-4">
<option  selected  value="<?= $ddd['deptId'] ?>"><?= $ddd['deptName'] ?></option>
        <?php foreach ($SELQUERY  as $gata): ?>
<option value="<?= $gata['id']  ?>"> <?= $gata['name']?> </option>
            <?php endforeach ?>
    </select>
  <button name="update" class="btn btn-info" >  update employee</button>
  </form>
    </div>
</div>
</div>






<?php
include '../public/script.php';
?>