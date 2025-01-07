<?php 
echo "hello1";

require_once "dbconfi.php";

function loginUser($connect,$email,$password){
    $emailexist = emailExsist($connect,$email);
    echo "hello3";
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
function invalidEmil($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;}
    function emailExsist($connect,$email){
        $sql = "SELECT * FROM users WHERE email='$email';"; 
            $result =  mysqli_query($connect,$sql);
            if($row = mysqli_fetch_assoc($result)){
                $result = $row;
                return $result;
            }else{
               $result = false;
               return $result;
            }
    }

 if(isset($_POST["submit_login"])){
          $password = $_POST["password"];
          $email = $_POST["email"];
          echo "hello2";
          loginUser($connect,$email,$password); 
         }


?>