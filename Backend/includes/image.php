<?php
session_start();
$id = $_SESSION['U_id'];

require 'db.php';
$post = mysqli_real_escape_string($conn, $_POST['txt']);
$type = "img";

if (isset($_POST['submit'])) {
    $tar = "useimg/";
    $file = basename($_FILES["file"]["name"]);
    $tarpath = $tar . $file;
    $fileType = pathinfo($tarpath,PATHINFO_EXTENSION);

    $allow = array('jpg','png','jpeg','gif','pdf');

    if(in_array($fileType, $allow)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $tarpath)) {
            if($type === "prof") {
                $img = $conn->query("UPDATE USER_PROFILE SET Profile_Picture = '$file' WHERE UserID='$id'");
            } else if ($type === "img") {
                $sql = "INSERT INTO POSTS (Body, UserID) VALUES ('$post', '$id')";
                
                if ($conn->query($sql) === TRUE) {
                $postid = $conn->insert_id;
                }

                $insert = $conn->query("INSERT INTO MEDIA (MediaInfo, UserID, PostID) VALUES ('$file', '$id', '$postid')");
            }
            if($insert||$img) {
                $stat = "File uploaded";
            } else {
                $stat = "Upload fail";
            } 
        } else {
            $stat = "error with file";
        }
    } else {
        $stat = "only certain files";
    }
} else {
    $stat = "please choose file";
}

echo $stat;
?>