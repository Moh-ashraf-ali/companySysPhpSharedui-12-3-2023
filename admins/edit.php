<?php 

include '../public/head.php';
include '../public/navbar.php';

include '../App/confige.php';
include '../App/function.php';
auth();


if(isset($_GET['edit'])){
$editid = $_GET['edit'];
$seledit = "select * from `admin` where id =$editid";
$selquery = mysqli_query($conn ,$seledit );
$sss = mysqli_fetch_assoc($selquery);
$adminname =  $sss['name'] ;
$adminpass =  $sss['password'] ;
$seledit1 = "select * from `adminwithrole` where `adminId` =$editid";
$selquery1 = mysqli_query($conn ,$seledit1 );
$sss1 = mysqli_fetch_assoc($selquery1);
$selesctrolefromroles = "SELECT * FROM `roles`";
$selRoles = mysqli_query($conn , $selesctrolefromroles);


if(isset($_POST['update'])){
  $adminnameupdated = $_POST['name'] ;
  $adminpassupdated = $_POST['password'] ;
  $adminroleupdated = $_POST['role'] ;
 

$update = "UPDATE `admin` SET  name = '$adminnameupdated'  , password = '$adminpassupdated' , role = $adminroleupdated  where id = $editid ";
$u = mysqli_query($conn , $update);
path('admins/list.php');
}
}


?>

<h1 class="text-center text-success  pt-5 mt-5" >Edit Department Page</h1>

<div class="container mt-4 col-md-6">
<div class="card bg-dark">
    <div class="card-body">
    <form method="post" >
    <div class="form-group">
    <label > Username</label>
    <input type="text" name="name" value="<?=$adminname?>" placeholder="username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label >Password </label>
    <input type="text" name="password"  value="<?=$adminpass?>" placeholder="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label >Admin role </label>
<select name="role" class="form-control" id="">
  <option selected  value="<?=$sss1['adminId']?>"><?=$sss1['rolesDescription']?> </option>
<?php foreach($selRoles as $data): ?>
  <option value="<?=$data['id']?>"><?=$data['description']?></option>
  <?php endforeach ; ?>
</select>    </div>

  <button name="update" class=" btn btn-info" > update admin</button>
  </form>

    </div>
</div>
</div>






<?php
include '../public/script.php';
 ?>