<?php
require 'sqlcon.php';
session_start();

if(isset($_POST['user']))
{
  $username = $_POST['user'];
  $password = md5($_POST['pwd']);

  
  if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username))
    {
      echo "<script>
      alert('Invalid Username. Should not contain special characters!');
      window.location.href='userlogin.html';
      </script>";
    }
    $sql="select * from users where username='".$username."'AND password='".$password."' limit 1";

    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==1){
        $_SESSION['user'] = $username;
        echo "".$_SESSION['user']."";

        echo "<script>
      
      window.location.href='homepage.php';
      </script>";

    }
    else{
      echo "<script>
      alert('Incorrect Password! Please Try Again.');
      window.location.href='userlogin.html';
      </script>";
    }

  
}
