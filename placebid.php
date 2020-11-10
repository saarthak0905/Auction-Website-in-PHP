<?php
require 'sqlcon.php';
session_start();

if(isset($_POST['amount']))
{
  $amount = $_POST['amount'];
  $name = $_GET['item'];
  $owner = $_GET['owner'];
  
  $query = "select bid_amount from items where owner = '$owner' AND name = '$name'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      if($row['bid_amount']>=$amount){
        echo "<script>
      alert('Bid Cannot be less than or equal to Current bid amount. Go Higher!')
      window.location.href='bidamount.php?item=$name&owner=$owner';
      </script>";
      }
      else{
        $sql = "UPDATE items SET bid_amount= $amount WHERE owner = '$owner' AND name = '$name'";
        $sql1 = "Insert into bids values(?, ?, ?, ?, now())";
        $stmt = $conn->prepare($sql1);
        $stmt->bind_param("ssss", $_SESSION['user'], $name, $amount, $owner);
        if (mysqli_query($conn, $sql) AND $stmt->execute()) {
          echo "<script>
      alert('Bidding Done Right! You are the highest bidder now!')
      window.location.href='bid.php';
      </script>";
        } else {
          echo "Error updating record: " . mysqli_error($conn);
        }
      }
    }
  }
}


?>