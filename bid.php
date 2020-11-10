<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bid For Item</title>
  
  
</head>

<body>
  <h1><u><center>WELCOME TO AUCTIONS 101</center></u></h1><br>
  <h2><center>BID FOR ITEMS HERE</center></h2><br>
  <div></div>
  
</body>
</html>



<?php
require 'sqlcon.php';
session_start();
$user = $_SESSION['user'];
if(isset($_SESSION['user']))
{
  $date_now = date("Y-m-d");
  $query = "select * from items order by closing_date desc";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
   

    echo "<table style = 'margin: auto; width: 80%; padding: 5px; border: 2px solid black' >";
    echo "<tr style = 'border: 1px solid black;'><th style = 'border: 1px solid black;'>ITEM NAME</th> <th style = 'border: 1px solid black;'>DESCRIPTION OF ITEM</th> <th style = 'border: 1px solid black;'>OWNER OF ITEM</th> <th style = 'border: 1px solid black;'>BID AMOUNT</th> <th style = 'border: 1px solid black;'>CLOSING DATE</th>  <th style = 'border: 1px solid black;'>PLACE BID</th> <th style = 'border: 1px solid black;'>VIEW BIDS</th></tr>";

    while($row = mysqli_fetch_assoc($result)) {
        if ($date_now > $row['closing_date']) {
          echo "<tr style = 'border: 1px solid black;'><td style = 'border: 1px solid black;'>" . $row['name'] . "</td><td style = 'border: 1px solid black;'>" .$row['description']. "</td><td style = 'border: 1px solid black;'>" .$row['owner']."</td><td style = 'border: 1px solid black;'>".$row['bid_amount']. "</td><td style = 'border: 1px solid black;'>" .$row['closing_date']. "</td><td style = 'border: 1px solid black;'> CLOSED ITEM</td><td style = 'border: 1px solid black;'>  <a href='viewbidders.php?item=".$row['name']."&owner=".$row['owner']."'>View Bids</a>  </td></tr>";
          
      }else{
        echo "<tr style = 'border: 1px solid black;'><td style = 'border: 1px solid black;'>" . $row['name'] . "</td><td style = 'border: 1px solid black;'>" .$row['description']. "</td><td style = 'border: 1px solid black;'>" .$row['owner']."</td><td style = 'border: 1px solid black;'>".$row['bid_amount']. "</td><td style = 'border: 1px solid black;'>" .$row['closing_date']. "</td><td style = 'border: 1px solid black;'>  <a href='bidamount.php?item=".$row['name']."&owner=".$row['owner']."'>BID</a>  </td><td style = 'border: 1px solid black;'>  <a href='viewbidders.php?item=".$row['name']."&owner=".$row['owner']."'>View Bids</a>  </td></tr>";
      }
      
      
      
    }
    echo "</table><br><br>";
  }
  echo "<div style='margin: auto 200px; width: 9%; border: solid 2px black; padding: 10px;'>";
  

  echo "<a href='homepage.php'> <- Back to main menu</a>";
  
  echo "</div>";
  
}
else
{
  echo "<script>
      
      window.location.href='userlogin.html';
      </script>";
}



?>