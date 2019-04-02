<?php
session_start();

if(isset($_POST['check']))
{
    $type = $_POST['check'];
    require 'db.php';
    
    switch($type) {
        case 'insert':
            $post = mysqli_real_escape_string($conn, $_POST['txt']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $studid = $_SESSION['U_id'];

            $sql = "INSERT INTO POSTS (Body, Title, UserID) VALUES ('$post', '$title', '$studid')";

            if (mysqli_query($conn, $sql)) {
                echo "1";
            } else {
                echo "Error: " . $sql . "" . mysqli_error($myqsli);
            }
            $conn->close();
            break;
        case 'alter':
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $obj = mysqli_real_escape_string($conn, $_POST['txt']);
            $text = "UPDATE POSTS
            SET Body='$obj'
            WHERE PostID='$id'";
            
            if (mysqli_query($conn, $text)) {
                echo "1";
            } else {
                echo "Error: " . $text . "" . mysqli_error($myqsli);
            }
            $conn->close();
            
            break;
    }
    
    
} else {
    echo "0";
}
?>