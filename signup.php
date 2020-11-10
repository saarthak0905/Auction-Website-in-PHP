<?php
require 'sqlcon.php';

if(isset($_POST['user']))
{
  $username = $_POST['user'];
  $password = $_POST['pwd'];
  $repass = $_POST['rpwd'];
  $phone = $_POST['phone'];
  if(strcmp($password, $repass)!=0)
  {
    echo "<script>
alert('Password Mismatch!');
window.location.href='userregister.html';
</script>";
  }
  if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username))
    {
      echo "<script>
      alert('Username Contains Special Character! Try Again.');
      window.location.href='userregister.html';
      </script>";
    }
  $result = mysqli_query($conn, "select username from users");
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      if($row['username'] == $username){
        echo "<script>
        alert('Username Already exists! Try Again with a different username.');
        window.location.href='userregister.html';
        </script>";
      }
    }
  }
  $password = md5($password);
  $sql = "Insert into users values(?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $password, $phone);
  if ($stmt->execute()) { 
    echo "<script>
        alert('User was registered successfully');
        window.location.href='userlogin.html';
        </script>";
 } else {
    echo "Error Occured!";
 }
}
