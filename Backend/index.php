<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require 'includes/db.php';

$result = $conn->query("SELECT POSTS.UserID, POSTS.PostID, POSTS.Body, POSTS.Title FROM POSTS");
mysqli_close($conn);


function redirect($url)
{
    $link = '<script type="text/javascript">';
    $link .= 'window.location = "' . $url . '"';
    $link .= '</script>';
    
    echo $link;
}
?>
<!DOCTYPE html>
<html>
<body>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Chris Page">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>SwanHub</title>
</head>
   <div class="site-container"> 
       <div class="site-pusher">
        <?php
        require 'content/header.php';
        if (isset($_SESSION["U_id"])) {
            include 'content/body.php';
        } else {
            redirect("login.php");
        }
        ?>
       </div>
    </div>
</body>
</html> 