<?php
require 'sqlcon.php';
session_start();
$owner = $_SESSION['user'];
$name = $_POST['item'];
$desc = $_POST['desc'];
$amount = $_POST['amount'];
$date = $_POST['close'];
if(isset($_SESSION['user'])){
if(isset($_POST['close']))
{
  $sql = "Insert into items values(?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $name, $owner, $desc, $amount, $date);
  if ($stmt->execute()) { 
    echo "<script>
        alert('Item registered successfully for Auction');
        window.location.href='homepage.php';
        </script>";
 } else {
    echo "Error Occured!";
 }
}
}
else{
  echo "<script>
      
      window.location.href='userlogin.html';
      </script>";
}





?>