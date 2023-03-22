<?php


include '/xampp/htdocs/sharedui/public/head.php';
include '/xampp/htdocs/sharedui/public/navbar.php';



include '../App/confige.php';
include '../App/function.php';

auth();
check($conn , "Connection");

$selesctrolefromroles = "SELECT * FROM `roles`";
$selRoles = mysqli_query($conn , $selesctrolefromroles);
if(isset($_POST['send'])){
    $adminName = $_POST['name'];
    $adminpass = sha1($_POST['password']);
    $adminrole = $_POST['roles'];

    $insert = "INSERT INTO  `admin`
 VALUES (null , '$adminName' , '$adminpass' , $adminrole )"  ;
$insertquery =  mysqli_query($conn , $insert );
check($insertquery , "Insert");

};



?>


<h1 class="text-center text-success  pt-5" >Add admins Page</h1>
<div class="container mt-4 col-md-6">
<div class="card bg-dark">
    <div class="card-body">
        <form method="post">
    <div class="form-group">
    <label > Admin name </label>
    <input type="text" name="name" placeholder="admin name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label > password </label>
    <input type="text" name="password" placeholder="admin password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label > Admin role </label>
<select  class="form-control" name="roles" id="">
<?php foreach($selRoles as $data) :?>
    <option value="<?=$data['id'] ?>"><?=$data['description'] ?></option>
    <?php endforeach ; ?>
</select> 
   </div>
    
  <button name="send" class="btn btn-info" >  Add admin</button>
  </form>
    </div>
</div>
</div>





<?php  



include '../public/script.php';
?>