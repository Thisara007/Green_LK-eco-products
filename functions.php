<?php
require_once "dbconfi.php";

function product_add_cart($connect,$sql){
    mysqli_query($connect,$sql);
    header("Location:index.php");
}

function get_from_cart($connect,$sql){

    $result=mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
function get_from_product($connect,$sql){
    
    $result=mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}


    if(isset($_POST["submit"])){
                    $fullname = $_POST["name"];
                    $password = $_POST["password"];
                    $email = $_POST["email"];
                    $mobile = $_POST["mobile"];
                    $address = $_POST["address"];
                    $passwordRepet = $_POST["password_verify"];

                    $passwordHash = password_hash($password,PASSWORD_DEFAULT);

                    if(invalidEmil($email) !== false){
                        echo "<script>alert('Invaid email !');</script>";
                        echo "<script>window.location.href='signup.php';</script>";
                        
                    }
                    if(pawdMatch($password,$passwordRepet) !== false){
                        echo "<script>alert('passwords does not match!');</script>";
                        echo "<script>window.location.href='signup.php';</script>";
                    }
                    if(emailExsist($connect,$email) !== false){
                        echo "<script>alert('Email already registered!');</script>";
                        echo "<script>window.location.href='signup.php';</script>";
                    }
                    if(pwdLength($password) !== false){
                        echo "<script>alert('password must contain 8 characters!');</script>";
                        echo "<script>window.location.href='signup.php';</script>";
                        
                     }
                    creatUser($fullname,$passwordHash,$email,$mobile,$address,$connect);
                    

                }else{
                     header("location : ../registration.php");
                     exit();
                }

                function invalidEmil($email){
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                        $result = true;
                    }else{
                        $result = false;
                    }
                    return $result;
                }
                function pawdMatch($password,$passwordRepet){
                    if($password !== $passwordRepet){
                        $result = true;
                    }else{
                        $result = false;
                    }
                    return $result;
                }
                function pwdLength($password){
                    if(strlen($password)<8){
                        $result = true; 
                    }else{
                        $result=false;
                    }
                    return $result;
                }
                function emailExsist($connect,$email){
                    $sql = "SELECT * FROM users WHERE email='$email';"; 
                        $result =  mysqli_query($connect,$sql);
                        if(mysqli_fetch_assoc($result)){
                            $result = true;
                            return $result;
                        }else{
                           $result = false;
                           return $result;
                        }
                }
                function creatUser($fullname,$passwordHash,$email,$mobile,$address,$connect){
                     $sql ="INSERT INTO users(name,email,mobile,address,password) VALUES ('$fullname','$email','$mobile','$address','$passwordHash')";
                     $result =  mysqli_query($connect,$sql);
                    if($result){
                        echo "<script>alert('User registered!');</script>";
                        echo "<script>window.location.href='login.php';</script>";
                    }
                        echo "<script>alert('Error occured!');</script>";
                        exit();
                }
?>

            
            