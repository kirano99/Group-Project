<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require 'includes/db.php';


$result = $conn->query("SELECT POSTS.UserID, POSTS.PostID, POSTS.Body, POSTS.DatePosted,
COUNT(LIKES.LikeID) AS likes, USER_PROFILE.First_Name AS fname, USER_PROFILE.Last_Name AS lname, COMMENTS.CommentText AS comment 

FROM POSTS

LEFT JOIN LIKES
ON POSTS.PostID = LIKES.PostID
LEFT JOIN USER_PROFILE
ON POSTS.UserID = USER_PROFILE.UserID
LEFT JOIN COMMENTS
ON POSTS.PostID = COMMENTS.PostID
GROUP BY POSTS.PostID
");



function redirect($url)
{
    $link = '<script type="text/javascript">';
    $link .= 'window.location = "' . $url . '"';
    $link .= '</script>';
    
    echo $link;
}

require 'content/header.php';
?>
        <?php
        if (isset($_SESSION["U_id"])) {
            include 'content/body.php';
        } else {
            redirect("login.php");
        }
require 'content/footer.php';
        ?>