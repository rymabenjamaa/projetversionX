<?php
session_start();

include "classes/ user.class.php";


if (isset($_POST['login'])){
  $username = $_POST['username'];
  $pwd = $_POST['pass'];  


  if (!preg_match("/^[a-zA-Z0-9 ]+$/",$username)){
    $username_error = "Name must contain only letters, numbers ans space";
    goto MOHSSEN;
  }
 
  
  if(strlen($pwd)<6){
    $pass_error = "Password must be minimum of 6 characters";
    goto MOHSSEN;
  }
  
  $User = new User;
  $auth = $User->login($username,$pwd);
  if(!$auth){
      $auth_error = "Incorrect Username or Password";
    }else{
      session_start();
      $_SESSION['username'] = $auth['username'];
      $_SESSION['email'] = $auth['email'];
            header('Location:../xxxxxxx.php');
  }
}
MOHSSEN:
include 'connecter.phtml';