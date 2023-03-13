<?php 
include '../public/head.php';
include '../public/navbar.php';


include '../App/confige.php';
include '../App/function.php';
check($conn , "connection");
auth();

$select = "SELECT * FROM `department`";
$ss = mysqli_query($conn , $select);
check($ss , "select");

if(isset($_GET['remove'])){
$id = $_GET['remove'];
$delete = "DELETE FROM `department` WHERE id =$id  ";
mysqli_query($conn , $delete);
echo "<script> location.replace('/sharedui/department/list.php')</script>";
}

?>


<h1  class="text-center text-success  " > List Department</h1>

<div class="container col-md-6">
<div class="card">
    <div class="card-body">

    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col"> Dept Name </th>
      <th scope="col"> Created at  </th>
      <th colspan="2" scope="col">  Action  </th>

    </tr>
  </thead>
<?php

foreach($ss as $data):?>

<tr>
    <th> <?=  $data['id'] ?> </th>
    <th> <?=  $data['name'] ?> </th>  
     <th> <?= substr($data['created-at'] ,5 ,11)   ?> </th>
     <th> <a href="edit.php?edit=<?=  $data['id'] ?>"> <i style="color: blue;"  class="fa-solid fa-pen-to-square"></a></i>  </th>
     <th> <a onclick="return confirm('are you sure ?')"  href="list.php?remove=<?=  $data['id'] ?>"><i style="color: red;" class="fa-solid fa-trash"></i></a> </th>

</tr>

<?php endforeach ; ?>

    </table>

    </div>










<?php
include '../public/script.php';


?>