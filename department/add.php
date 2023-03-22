<?php


include '/xampp/htdocs/sharedui/public/head.php';
include '/xampp/htdocs/sharedui/public/navbar.php';



include '../App/confige.php';
include '../App/function.php';

auth(2, 3);
check($conn, "Connection");

$errors = [];
print_r($errors);
if (isset($_POST['send'])) {
    $DEPTNAME = validation($_POST['dept-name']);

    if (stringValidation($DEPTNAME)) {
        $errors[] = "please enter valid department Name and must be > 3";
    }

    if (empty($errors)) {
        $insert = "INSERT INTO  `department`
 VALUES ( NULL ,'$DEPTNAME', DEFAULT  )";
        $insertquery =  mysqli_query($conn, $insert);
        check($insertquery, "Insert");

    }
};



?>


<h1 class="text-center text-success  pt-5">Add Department Page</h1>
<div class="container mt-4 col-md-6">
    <?php if (!empty($errors)) :  ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $data) : ?>
                    <li><?= $data ?></li>
                <?php endforeach;  ?>
            </ul>
        </div>

    <?php endif;  ?>
    <div class="card bg-dark">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label> Department Name </label>
                    <input type="text" name="dept-name" placeholder="dept name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button name="send" class="btn btn-info"> Add Department</button>
            </form>
        </div>
    </div>
</div>





<?php



include '../public/script.php';
?>