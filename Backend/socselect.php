<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'includes/db.php';
require 'content/header.php';
$id = $_SESSION['U_id'];

$about = $conn->query("SELECT USER_PROFILE.UserID, USER_PROFILE.First_Name, USER_PROFILE.Last_Name, USER_PROFILE.DOB, USER_PROFILE.CourseID, USER_PROFILE.About FROM USER_PROFILE WHERE UserID = '$id' LIMIT 1");
mysqli_close($conn);

 while ($mem = mysqli_fetch_object($about)) {
        $USER_PROFILE[] = $mem;
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
              <a class="nav-link" href="events.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="courseselect.php">Course</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="socselect.php">Societies</a>
            </li>
          </ul>
          <hr class="d-sm-none">
        </div>
        <div class="col-sm-6">
          <a href="socs.php">
            <div class="jumbotron courseimg" style='background-image: url("assets/compsci.jpg");'>
              <h1>Computer Science</h1>
              <p>The sooner you realise Kevin isn't funny, the better</p>
            </div>
          </a>
          <a href="socs.php">
            <div class="jumbotron courseimg"  style='background-image: url("assets/maths.jpg");'>
              <h1>Maths</h1>
              <p>Good luck mate</p>
            </div>
          </a>
        </div>
        <div class="col-sm-2" id="whitespace">
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
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
  <script>
  // Get the modal
  var modal = document.getElementById('imageModal');

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementsByClassName('postcontent');
  var modalImg = document.getElementById("img");
  var captionText = document.getElementById("caption");

  for (var i=0; i < img.length; i++) {
      img[i].onclick = function(){
          modal.style.display = "block";
    		modalImg.src = this.getElementsByTagName('img')[0].src;
    			captionText.innerHTML = this.getElementsByTagName('p')[0].innerHTML;
      }
  };

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  </script>
  </body>
  </html>
