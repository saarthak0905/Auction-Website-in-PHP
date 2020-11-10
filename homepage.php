<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>homepage</title>
</head>
<body>
<h1><u><center>WELCOME TO AUCTIONS 101</center></u></h1><br>
<center><h2 id = 'usermsg'></h2></center><br>
<div style="margin: auto; width: 20%; border: solid 2px black; padding: 10px;">
  <h3>MAIN MENU: </h3>
<form action="auction.html" style="margin: auto; width: 80%; padding: 5px; ">
    <input type="submit" value="AUCTION ITEM" />
</form>
<form action="deleteauction.php" style="margin: auto; width: 80%; padding: 5px; ">
    <input type="submit" value="DELETE ITEM" />
</form>

<form action="bid.php" style="margin: auto; width: 80%; padding: 5px; ">
    <input type="submit" value="BID FOR ITEM" />
</form>
<form action="changepassword.html" style="margin: auto; width: 80%; padding: 5px; ">
    <input type="submit" value="CHANGE PASSWORD" />
</form>
<form action="logout.php" style="margin: auto; width: 80%; padding: 5px; ">
    <input type="submit" value="LOGOUT" />
</form>
</div>
  
</body>
</html>


<?php
require 'sqlcon.php';
session_start();
if(isset($_SESSION['user']))
{
  $username = $_SESSION["user"];
  $message = "Hello there $username";
  echo "<script>
        document.getElementById('usermsg').innerHTML = '$message'
  
        </script>";
}
else
{
  echo "<script>
      
      window.location.href='userlogin.html';
      </script>";
}

?>
