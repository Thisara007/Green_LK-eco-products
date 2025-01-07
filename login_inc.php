<?php 
require_once "functions.php";
require_once "dbconfi.php";
echo "hello";
function loginUser($connect,$email,$password){
    $emailexist = emailExsist($connect,$email);
    echo "hello";
    if($emailexist === false){
        echo "<script>alert('Error login !');</script>";
        echo "<script>window.location.href='login.php';</script>";
        exit();
    }

    $pwdHashed = $emailexist["password"];
    $chekpwd = password_verify($password,$pwdHashed);

    if($chekpwd === false){
        echo "<script>alert('Wrong password!');</script>";
        echo "<script>window.location.href='login.php';</script>";
        exit(); 
    }elseif($chekpwd === true){
       // session_start();
        //$_SESSION["id"] = $emailexist["user_id"];
        //$_SESSION["full_name"] = $emailexist["name"];
       
        echo "<script>window.location.href='index.php';</script>";
        exit(); 
    }
    
}

 if(isset($_POST["submit_login"])){
          $password = $_POST["password"];
          $email = $_POST["email"];
          echo "hello";
          loginUser($connect,$email,$password); 
         }


?>