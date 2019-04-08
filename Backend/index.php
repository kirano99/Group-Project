<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require 'includes/db.php';


$result = $conn->query("SELECT POSTS.UserID, POSTS.PostID, POSTS.Body, POSTS.DatePosted FROM POSTS");
mysqli_close($conn);


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