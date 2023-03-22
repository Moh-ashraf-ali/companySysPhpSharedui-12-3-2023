<?php
include '../public/head.php';
include '../public/navbar.php';


include '../App/confige.php';
include '../App/function.php';
check($conn, "connection");
auth();
$select = "SELECT * FROM `adminwithrole`";
$ss = mysqli_query($conn, $select);
check($ss, "select");

if (isset($_GET['remove'])) {
  $id = $_GET['remove'];
  $delete = "DELETE FROM `admin` WHERE id =$id  ";
  mysqli_query($conn, $delete);
  echo "<script> location.replace('/sharedui/admins/list.php')</script>";
}

?>


<h1 class="text-center text-success  "> List Department</h1>

<div class="container col-md-6">
  <div class="card">
    <div class="card-body">

      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col"> admin Name </th>
            <th scope="col"> admin role </th>

            <th colspan="2" scope="col"> Action </th>

          </tr>
        </thead>
        <?php

        foreach ($ss as $data) : ?>

          <tr>
            <th> <?= $data['adminId'] ?> </th>
            <th> <?= $data['adminName'] ?> </th>
            <th> <?= $data['rolesDescription']?> </th>
            <th> <a href="edit.php?edit=<?= $data['adminId'] ?>"> <i style="color: blue;" class="fa-solid fa-pen-to-square"></a></i> </th>
            <th> <a onclick="return confirm('are you sure ?')" href="list.php?remove=<?= $data['adminId'] ?>"><i style="color: red;" class="fa-solid fa-trash"></i></a> </th>

          </tr>

        <?php endforeach; ?>

      </table>

    </div>










    <?php
    include '../public/script.php';


    ?>