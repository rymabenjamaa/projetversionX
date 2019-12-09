<?php 
include "classes/user.class.php";
if (isset($_POST['signup'])){
  $username = $_POST['nom'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];  
  $cpass = $_POST['cpass'];
  $tel = $_POST['phone'];
  

  if (!preg_match("/^[a-zA-Z0-9 ]+$/",$username)){
    $username_error = "Name must contain only letters, numbers ans space";
    goto MAMOOOO;
  }
  if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $email_error = "Please enter valid email";
    goto MAMOOOO;
  }
  if(strlen($pass)<6){
    $pass_error = "Password must be minimum of 6 characters";
    goto MAMOOOO;
  }
  if($pass != $cpass){
    $cpass_error = "Passwordand Confirm password does NOT much";
    goto MAMOOOO;
  }
   if($tel<0){
    $pass_error = "Num tel must be positive";
    goto MAMOOOO;
  }
  $User = new User;
  $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
  $User->register($username,$tel,$email,$hashed_password);
}
MAMOOOO:
include 'employe.phtml';