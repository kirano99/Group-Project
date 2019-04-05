
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'includes/db.php';
$result = $conn->query("SELECT POSTS.UserID, POSTS.PostID, POSTS.Body, FROM POSTS");
mysqli_close($conn);
function redirect($url)
{
$link = '<script type="text/javascript">';
$link .= 'window.location = "' . $url . '"';
$link .= '</script>';

echo $link;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/popper.js"></script>
    <script src="https://unpkg.com/tooltip.js"></script>
    <script src="js/javascript.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Social Network</title>
  </head>
  <body>
    <header>
      <a href="#" class="icon" id="icon"></a>
      <nav class="menu">
      <a href="index.html">
        <img alt="logo" id="logo" src="assets/logo.png">
      </a>
      </nav>
      <div class="socials">
        <a href="index.html"><i class="fas fa-home home"></i></a>
        <a href="#"><i class="fas fa-bell"></i></a>
        <a><i class="fas fa-comment"></i></a>
        <a href="account.html"><i class="fas fa-user"></i></a>
      </div>
    </header>
    <?php
        require 'content/header.php';
        if (isset($_SESSION["U_id"])) {
            include 'content/body.php';
        } else {
            redirect("login.php");
        }
        ?>
    <div class="container-fluid" style="margin-top:30px">
      <div class="row">
        <div class="col-sm-1" id="whitespace">
        </div>
        <div class="col-sm-2 links ">
          <h3>Links</h3>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="events.html">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="courseselect.html">Course</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="socselect.html">Societies</a>
            </li>
          </ul>
          <hr class="d-sm-none">
        </div>
        <div class="col-sm-6">
            <div class= "post">
            <div class="form-group shadow-textarea">
              <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="What you thinking..."></textarea>
            </div>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
            <input type="submit" class="btn btn-primary" value="Post" style="float:right">
          </div>
          <?php foreach($POSTS as $post): ?>
            <div class="post">
              <div class="userdetails">
                <div class="accountimage">
                    <img src="assets/account1.jpg" class="rounded" />
                </div>
                <div class="accountname">
                  <h4>Ronald McDonald Trump</h4>
                </div>
                <div class="postdatetime">
                  <i>Posted Dec 7 2017 10:52am</i>
                </div>
              </div>
              <div class="postcontent">
                <p>?php echo $post->Body; ?></p>
                <img src="assets/whitehouse.jpg" />
                <br>
              </div>
              <div class="d-flex justify-content-around mb-2 review">
                <a href="#"><i class="far fa-thumbs-up likeBtn" id="<?php echo $post->PostID; ?>"></i></a>
                <a href="#"><i class="far fa-comment-alt"></i></a>
                <?php if ($post->UserID == $_SESSION["U_id"]) {?>
                    <button class="Edtbtn" data-toggle="modal" data-target="#myModal" id="<?php echo $post->PostID; ?>">Edit</button>
                    <button class="Delbtn" id="<?php echo $post->PostID; ?>">Delete</button>
                <?php } ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="col-sm-2" id="whitespace">
        </div>
      </div>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr_only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">details</h4>
                </div>
                <form id="EditPost">
                    <input name="dash" id="dash"/>
                    <button type="button" id="ChngPost" class="btn btn-secondary">Change</button>
                </form>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

      <!-- The Modal -->
      <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img">
        <div id="caption"></div>
      </div>
    </div>

    <div class="site-cache" id="site-cache"></div>
  <!-- Optional JavaScript -->
  </body>
  </html>
