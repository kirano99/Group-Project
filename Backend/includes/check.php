<?php
session_start();

if (isset($_POST['check']))
{
require 'db.php';
$studid = mysqli_real_escape_string($conn, $_POST['studentid']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
    
$sqlPass = "SELECT UserPassword, UserID from USERS where Username = '$studid'";
$PassRes = mysqli_query($conn, $sqlPass);
if ($PassRes->num_rows > 0)
{
    while ($row = $PassRes->fetch_assoc()) {
        //$hashedPass = password_hash($, PASSWORD_DEFAULT);
         if(password_verify($pass, $row['UserPassword'])) {
              $_SESSION['U_id'] = $row['UserID'];
             echo "1";
         } else {
             echo "fail";
         }
    }
} else {
    echo "0";
}
/*
$row = mysqli_fetch_array($result);


$count = $row['cntUser'];
 
if($count > 0)
    {
        $_SESSION['user'] = $studid;
        echo "1";
    }
    else
    {
        echo "y";
    }
    exit();
}
*/
}
?>