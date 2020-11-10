<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bidders List</title>
  
  
</head>

<body>
  <h1><u><center>WELCOME TO AUCTIONS 101</center></u></h1><br>
  <h2><center>Bidder List</center></h2><br>
  <div></div>
  
</body>
</html>
<?php
require 'sqlcon.php';
session_start();
$name = $_GET['item'];
$owner = $_GET['owner'];

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
  echo "</div><br><br>";
  $query = "select * from bids where owner = '$owner' AND item = '$name' order by bid desc";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    echo "<table style = 'margin: auto; width: 60%; padding: 5px; border: 2px solid black' >";
    echo "<tr style = 'border: 1px solid black;'><th style = 'border: 1px solid black;'>BIDDER</th> <th style = 'border: 1px solid black;'>BID</th> <th style = 'border: 1px solid black;'>BID DATE</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr style = 'border: 1px solid black;'><td style = 'border: 1px solid black;'>".$row['Bidder'] . "</td><td style = 'border: 1px solid black;'>".$row['bid']. "</td><td style = 'border: 1px solid black;'>".$row['bid_date']."</td></tr>"; 
    }
    echo "</table><br><br>";
  }
  else
  {
    echo "<p><center>NO BIDS PLACED YET.</center></p>";
  }
  echo "<div style='margin: auto ; width: 9%; border: solid 2px black; padding: 10px;'>";

  echo "<a href='homepage.php'> <- Back to main menu</a><br>";
  echo "<a href='bid.php'> <- Back to Item List</a>";
  echo "</div>"



?>