<?php
session_start();

if (isset($_POST['check']))
{
     
    $type = $_POST['check'];
    require 'db.php';
    
    switch ($type) {
        case 'new':
            $pass = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_ARGON2I);
            $first = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $sql = "INSERT INTO USERS (Email, Username, UserPassword, IsAdmin) VALUES ('$email', '$first', '$pass', 0)";

            if (mysqli_query($conn, $sql)) {
                $last_id = $conn->insert_id;
                
                $sql = "INSERT INTO USER_PROFILE (UserID) VALUES ('$last_id')";
                if (mysqli_query($conn, $sql)){
                     $_SESSION['U_id'] = $last_id;
                    echo 1;
                } else {
                    echo "Error: " . $sql . "" . mysqli_error($myqsli);
                }
            } else {
                echo "Error: " . $sql . "" . mysqli_error($myqsli);
            }
            $conn->close();
            break;
        case 'profile':
            $first = mysqli_real_escape_string($conn, $_POST['first']);
            $last = mysqli_real_escape_string($conn, $_POST['last']);
            $dob = mysqli_real_escape_string($conn, $_POST['dob']);
            //$list = mysqli_real_escape_string($conn, $_POST['list']);
            
            $id =  $_SESSION['U_id'];
            
            $sql = "UPDATE USER_PROFILE SET First_Name='$first', Last_Name='$last', DOB='$dob' WHERE UserID='$id'";
            
            if (mysqli_query($conn, $sql)) {
                echo 1;
            } else {
                echo "Error: " . $sql . "" . mysqli_error($myqsli);
            }
            $conn->close();
            break;
        case 'Bio':
            $bio = mysqli_real_escape_string($conn, $_POST['txt']);
            $id =  $_SESSION['U_id'];
                
            $sql = "UPDATE USER_PROFILE SET About='$bio' WHERE UserID='$id'";
            
            if (mysqli_query($conn, $sql)) {
                echo 1;
            } else {
                echo "Error: " . $sql . "" . mysqli_error($myqsli);
            }
            $conn->close();
            break;
    }
}
?>