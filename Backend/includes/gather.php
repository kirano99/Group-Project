<?php
session_start();

require 'db.php';



if (isset($_POST['check'])) {
    $id = $_POST['id'];
    
    //$test = mysql_result(mysqli_query("SELECT P_description FROM posts WHERE P_id = '$id'"), 0);
    $X = mysqli_query($conn, "SELECT P_description FROM posts WHERE P_id = '$id'");
    $test =  mysqli_fetch_array($X);
    
    if (!$X) {
        echo "Error:  %s\n", mysqli_error($conn);
        exit();
    }
    
    echo json_encode($test[0]);
}


?>