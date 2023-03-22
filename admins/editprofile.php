<?php 

include '../public/head.php';
include '../public/navbar.php';

include '../App/confige.php';
include '../App/function.php';
auth(2,3);


$editid1 = $_SESSION['id'];
$seledit = "select * from `admin` where id =$editid1";
$selquery = mysqli_query($conn ,$seledit );
$sss = mysqli_fetch_assoc($selquery);

if(isset($_POST['updateprofile'])){
  $nameupdated = $_POST['name'];
  $passupdated = $_POST['password'];
  $passhashed = sha1($passupdated);

  if(empty($_FILES['image']['name'])){
    $imagename = $sss['image'] ;
  }else{
  $imagename = rand(0,9999999) . $_FILES['image']['name'];
  $imagetmpname =  $_FILES['image']['tmp_name'];
  $location = "upload/".$imagename;
  move_uploaded_file($imagetmpname , $location);
  }
  $ypdateprofile = "UPDATE `admin` SET name = '$nameupdated' , password = '$passhashed' , image = '$imagename' where id = $editid1 ";
 $doneupdate =  mysqli_query($conn , $ypdateprofile );
  check( $doneupdate , "update");
  path("admins/yourprofile.php");
}


?>

<h1 class="text-center text-success  pt-5 mt-5" >Edit Admin profile Page</h1>

<div class="container mt-4 col-md-4">
<div class="card bg-dark">
  <img src="./upload/<?=$sss['image']?>" class="card-img-top" alt="">
    <div class="card-body">
    <form method="post" enctype="multipart/form-data" >
    <div class="form-group">
    <label > Admn name</label>
    <input type="text" name="name" value="<?=$sss['name']?>" placeholder="username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label >Password </label>
    <input type="text" name="password"  value="<?=$sss['password']?>" placeholder="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label > Admin image</label>
    <input type="file" name="image" placeholder="image url"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

  <button name="updateprofile" class=" btn btn-info" > update admin</button>
  </form>

    </div>
</div>
</div>






<?php
include '../public/script.php';
 ?>