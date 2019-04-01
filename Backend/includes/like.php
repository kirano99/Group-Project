<?php
session_start();

require 'db.php';

if(isset($_POST['check'])) {
    $type = $_POST['check'];
    $id = $_POST['P_id'];
    
    switch($type) {
        case 'likeBtn':
            $sql = "INSERT INTO post_likes (U_id, P_id)
                SELECT {$_SESSION['U_id']}, {$id}
                FROM posts WHERE EXISTS (
                    SELECT P_id
                    FROM posts
                    WHERE P_id = {$id})
                AND NOT EXISTS (
                    SELECT Like_id
                    FROM post_likes
                    WHERE  U_id = {$_SESSION['U_id']}
                    AND P_id = {$id})
                    LIMIT 1";
            mysqli_query($conn, $sql);
            echo "1";
            break;
        case 'DisBtn':
            $sql = "DELETE FROM post_likes
                    WHERE P_id = {$id}
                    AND U_id = {$_SESSION['U_id']}
                    LIMIT 1";
            mysqli_query($conn, $sql);
            echo "1";
            break;
            
        case 'Delbtn':
            $sql = "DELETE FROM posts
                    WHERE P_id = {$id}
                    LIMIT 1";
            mysqli_query($conn, $sql);
            echo "1";
            break;
    }
} 