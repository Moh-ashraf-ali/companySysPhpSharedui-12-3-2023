<?php 
include '../public/head.php';
include '../public/navbar.php';

// connect
include '../App/confige.php';
include '../App/function.php';
// check connection
check($conn , "connection");
auth(2);

// select from view 
$select = "SELECT * FROM  `empwithdept`";
$ss = mysqli_query($conn , $select);
check($ss , "select");

// delete row
if(isset($_GET['remove'])){

$id = $_GET['remove'];
$selbyid = "SELECT * FROM  `empwithdept` where empId =$id";
$selwithimage = mysqli_query($conn , $selbyid);
$row = mysqli_fetch_assoc($selwithimage);
$imageNamefordelete = $row['empImage'];
unlink("./upload/$imageNamefordelete");
$delete = "DELETE FROM `employee` WHERE id =$id  ";
mysqli_query($conn , $delete);

echo "<script> location.replace('/sharedui/employee/list.php')</script>";
}

?>


<h1  class="text-center text-success  " > List employee</h1>

<div class="container col-md-6">
<div class="card">
  <form action="./search.php" method="post">
  <div class="input-group mb-3">
  <input type="text" name="searchInput" id="myInput" class="form-control mr-3" placeholder="search in employee name" >
    <button class="btn btn-success" name="searchButton">Search</button>
    
</div>

  </form>
    <div class="card-body">

    <table id="myTable" class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Employee name</th>
      <th scope="col">Employee salary</th>
      <th scope="col">Employee image</th>
      <th scope="col"> Dept Name </th>

      <th colspan="2" scope="col">  Action  </th>

    </tr>
  </thead>
<?php

foreach($ss as $data):?>

<tr>
    <th> <?=  $data['empId'] ?> </th>
    <th> <?=  $data['empName'] ?> </th>  
    <th> <?=  $data['empSalary'] ?> </th>  
    <th>  <img width="80px" src="./upload/<?=$data['empImage'] ?>" alt=""></th>  
     <th> <?=  $data['deptName'] ?> </th>

     <th> <a href="/sharedui/employee/edit.php?edit=<?=  $data['empId'] ?>"> <i style="color: blue;"  class="fa-solid fa-pen-to-square"></a></i>  </th>
     <th> <a onclick="return confrim('Are you sure ?')" href="/sharedui/employee/list.php?remove=<?=  $data['empId'] ?>"><i style="color: red;" class="fa-solid fa-trash"></i></a> </th>
     <th> <a  href="/sharedui/employee/show.php?show=<?=  $data['empId'] ?>"><i class="fa-sharp fa-solid fa-eye"></i></a> </th>
</tr>

<?php endforeach ; ?>
    </table>

    </div>










<?php
include '../public/script.php';


?>