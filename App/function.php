<!-- check func -->
<?php
function check($condition, $message)
{
    if ($condition) {
        echo  " <div class='container col-md-6 text-center'>
         <div class=' mt-5 pt-5 alert alert-primary'>
        $message succes
        </div>
        </div>";
    } else {
        echo  " <div class='container col-md-6 text-center'>
        <div class=' mt-5 pt-5 alert alert-danger'>
       $message failed
       </div>
       </div>";
    };
}

// go to path func
function path($go)
{

    echo "<script>location.replace('/sharedui/$go') </script>";
}

// authintication func close and located to login page
function auth($role1 = null, $role2 = null)
{
    if (!$_SESSION['admin']) {
        header("location:/sharedui/admins/login.php");
    } else {
        if ($_SESSION['roles'] == 1 || $_SESSION['roles'] == $role1 || $_SESSION['roles'] == $role2) {
        } else {
            header("location:/sharedui/public/403.php");
        }
    }
}



// validation filter 
function validation($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = strip_tags($input);
    $input = stripslashes($input);
    return $input;
}

// string validation (empty - strlength <3) bool
function stringValidation($input)
{
    $empty = empty($input);
    $length = strlen($input) < 3;
    if ($empty == true || $length == true) {
        return true;
    } else {
        return false;
    }
};
// number validation (empty - strlength <3) bool

function numValidation($input)
{
    $empty = empty($input);
    $isnotInteger = filter_var($input, FILTER_VALIDATE_INT) == false; // معناها لو عملت فلتر على الانبوت وطلع بغلط يعنى فية مشكلة 
    $isnegative = $input < 0;
    if( $empty == true ||$isnotInteger == true||$isnegative == true  ){
        return true ;
    }
};


// validation size of file
 
function filesizeMega ($file , $sizemega){
    $file = ($file / 1024) / 1024 ;
    if($file > $sizemega ){
        return true ;
    }else{
        return false ;
    }


}



// 
// validation type of file

function imagetypes ( $imageType){
    if($imageType == "image/jpeg" || $imageType == "image/jpg" ||$imageType == "image/gif" ||$imageType == "image/png" ){
        return false ;
    }else{
        return true ;
    }
}



?>