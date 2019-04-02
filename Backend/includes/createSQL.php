<?php
if (isset($_POST['check']))
{
    require 'db.php';
    
    $pass = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_ARGON2I);
    $first = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $sql = "INSERT INTO USERS (Email, Username, UserPassword, IsAdmin) VALUES ('$email', '$first', '$pass', 0)";
    
    if (mysqli_query($conn, $sql)) {
        echo "1";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($myqsli);
    }
    $conn->close();
}
?>