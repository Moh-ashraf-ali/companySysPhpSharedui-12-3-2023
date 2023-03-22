<?php 

session_start();
 if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header("location:/sharedui/admins/login.php");
 }




?>

<nav class="navbar navbar-expand-lg navbar-dark navbar  bg-dark fixed-top ">
        <a class="navbar-brand" href="#">GHILION</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
<div class="collapse navbar-collapse " id="navbarNav">
<?php if(isset($_SESSION['admin'])) : ?>

 <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="nav-link" href="/sharedui/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/sharedui/admins/yourprofile.php">Your profile <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Department
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/sharedui/department/add.php">Add Department</a>
          <a class="dropdown-item" href="/sharedui/department/list.php">List Department</a>
        </div>

      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Employee
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/sharedui/employee/add.php">Add Employee</a>
          <a class="dropdown-item" href="/sharedui/employee/list.php">List Employee</a>
        </div>
        
      </li>
      <?php if($_SESSION['roles'] ==1): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Admins
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/sharedui/admins/add.php">Add admin</a>
          <a class="dropdown-item" href="/sharedui/admins/list.php">List admin</a>
        </div>
        
      </li>
<?php endif ;   ?>
  
</ul>
<?php endif; ?>
</div>
<?php if(!isset($_SESSION['admin'])) { ?>
<div class="div-inline">
    <a class="btn btn-outline-info my-2 my-sm-0" href="/sharedui/admins/login.php">Login</a>
    </div>
<?php }else { ?>
<form >
  <button  name="logout" class=" ml-3 btn btn-danger" > Logout</button>
</form>
<?php } ?>
    </nav>