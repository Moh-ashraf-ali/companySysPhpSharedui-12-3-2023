<?php
function check ($condition , $message){
    if ($condition) {
        echo  " <div class='container col-md-6 text-center'>
         <div class=' mt-5 pt-5 alert alert-primary'>
        $message succes
        </div>
        </div>"
            ;
    } else {
        echo  " <div class='container col-md-6 text-center'>
        <div class=' mt-5 pt-5 alert alert-danger'>
       $message failed
       </div>
       </div>"
 ;
    };
    }
    
    ?>

<?php 



function path ($go){
    
    echo"<script>location.replace('/sharedui/$go') </script>";
    
    
}






function auth(){
    if(!$_SESSION['admin']){
        header("location:/sharedui/admins/login.php");
    }
}

