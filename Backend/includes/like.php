<?php
session_start();

require 'db.php';

if(isset($_POST['check'])) {
    $type = $_POST['check'];
    $id = $_POST['P_id'];
    
    switch($type) {
        case 'likeBtn':
            $sql = "INSERT INTO LIKES (UserID, PostID)
                SELECT {$_SESSION['U_id']}, {$id}
                FROM posts WHERE EXISTS (
                    SELECT PostID
                    FROM POSTS
                    WHERE PostID = {$id})
                AND NOT EXISTS (
                    SELECT UserID
                    FROM POSTS
                    WHERE  UserID = {$_SESSION['U_id']}
                    AND PostID = {$id})
                    LIMIT 1";
            mysqli_query($conn, $sql);
            echo "1";
            break;
        case 'DisBtn':
            $sql = "DELETE FROM LIKES
                    WHERE PostID = {$id}
                    AND UserID = {$_SESSION['U_id']}
                    LIMIT 1";
            mysqli_query($conn, $sql);
            echo "1";
            break;
            
        case 'Delbtn':
            $sql = "DELETE FROM POSTS
                    WHERE PostID = {$id}
                    LIMIT 1";
            mysqli_query($conn, $sql);
            echo "1";
            break;
    }
} 