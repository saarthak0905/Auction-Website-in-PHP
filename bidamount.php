<?php
require 'sqlcon.php';
session_start();
$name = $_GET['item'];
$owner = $_GET['owner'];
if(isset($_SESSION['user'])){
  if(isset($_GET['item']))
  {
    echo "<h1><u><center>WELCOME TO AUCTIONS 101</center></u></h1><br><br>
    <h2><center>PLACE YOUR BID</center></h2><br><br>";
    echo "<div style='margin: auto; width: 20%; border: solid 2px black; padding: 10px;'>";
    echo "<p style = 'width = 50%; margin: auto; font-weight = 3px'><center><b><u>Item Details</u></b></center></p><br>";

    $query = "select * from items where name = '$name' AND owner = '$owner'";
    $result = mysqli_query($conn, $query);
  

      while($row = mysqli_fetch_assoc($result)) {
        echo "Item Name : - ".$row['name']."<br>";
        echo "Item Description : - ".$row['description']."<br>";
        echo "Owner : - ".$row['owner']."<br>";
        echo "Current Bid Amount : - ".$row['bid_amount']."<br><br>";
      }
      echo "<form action = 'placebid.php?item=$name&owner=$owner' method = 'POST'>";
      //$_POST['itemname'] = $name;
      //$_POST['itemowner'] = $owner;
      echo "<label for = 'amount'>Enter Bid Amount(in Rs.) : </label>";
      echo "<input type = 'number' id = 'amount' name = 'amount'><br><br>";
      echo "<input type = 'submit' id = 'submit' value = 'PLACE' name = 'submit'>";

      echo "</form>";


    echo "<a href='homepage.php'> <- Back to main menu</a><br>";
    echo "<a href='bid.php'> <- Back to Item List</a>";

    
    echo "</div>";
  }
  else{
    echo "<script>window.location.href='bid.php';</script>";
  }
}
else{
  echo "<script>window.location.href='userlogin.html';</script>";
}
