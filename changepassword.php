<?php
require 'sqlcon.php';
session_start();
$oldpwd = $_POST['pwd'];
$newpwd = $_POST['npwd'];
$repwd = $_POST['rnpwd'];
$username = $_SESSION['user'];
if(isset($_SESSION['user']))
{
  if(strcmp($newpwd, $repwd)!=0)
  {
    echo "<script>
alert('Password Mismatch!');
window.location.href='changepassword.html';
</script>";
  }
  $query =  "select password from users where username = '$username'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      if($row['password'] != $oldpwd){
    
        echo "<script>
        alert('Older version of Password is Incorrect! Try Again.');
        window.location.href='changepassword.html';
        </script>";  
      }
    }   
    
  }
  $sql = "Update users set password = ? where username = '$username'";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $newpwd);
  if ($stmt->execute()) { 
    echo "<script>
        alert('Password Changed Successfully!');
        window.location.href='homepage.php';
        </script>";
 } else {
    echo "Error Occured!";
 }
  
}
else
{
  echo "<script>
      
      window.location.href='userlogin.html';
      </script>";
}


?>