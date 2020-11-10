<?php
require 'sqlcon.php';
session_start();
$name = $_GET['item'];
$query ="select * from items where owner='".$_SESSION['user']."'AND name='".$name."' limit 1";

    $result=mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==0){
           
        

        echo "<script>
      alert('Item Not Found!')
      window.location.href='deleteauction.php';
      </script>";

    }
    else{
      //code to delete item from sql table
      $sql = "DELETE FROM items WHERE name = '$name'";
      $sql1 = "Delete From bids where item = '".$name."' AND owner = '".$_SESSION['user']."'";

      if (mysqli_query($conn, $sql) AND mysqli_query($conn, $sql1)) {
        echo "<script>
      alert('Item Was Deleted Successfully!')
      window.location.href='deleteauction.php';
      </script>";
      } else {
        echo "<script>
      alert('Error deleting the record! Try Again.')
      window.location.href='deleteauction.php';
      </script>";
      }
    }


?>