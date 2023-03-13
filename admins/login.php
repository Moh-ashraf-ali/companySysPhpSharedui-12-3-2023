<?php
include '../public/head.php';
include '../public//navbar.php';


// connect db
include '../App/confige.php';
// functions
include '../App/function.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sel = "select * from admin where name = '$username' and password = '$password'";
    $s = mysqli_query($conn , $sel);
    $numOfRow = mysqli_num_rows($s);
    if($numOfRow == 1){
        $_SESSION['admin'] =  "$username" ;
   path("index.php");   
    }else{
        path("admins/login.php");   
  
    }

}


?>
<h1 class="text-center text-success  pt-5 mt-5" >Login Page</h1>
<div class="container mt-4 col-md-6">
<div class="card bg-dark">
    <div class="card-body">
        <form method="post" >
    <div class="form-group">
    <label > Username</label>
    <input type="text" name="username" placeholder="username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
    <label >Password </label>
    <input type="password" name="password" placeholder="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

  <button name="login" class=" btn btn-info" > Login</button>
  </form>
    </div>
</div>
</div>
