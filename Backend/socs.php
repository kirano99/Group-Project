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
      <div class="jumbotron courseimg"  style='background-image: url("assets/compsci.jpg");'>
        <h1>Computer Science</h1>
        <p>The sooner you realise Kevin isn't funny, the better</p>
      </div>
      <div class="row">
        <!-- <div class="col-sm-1" id="whitespace">
        </div> -->
        <div class="col-sm-2 links">
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
                  <i><?php echo $post->DatePosted; ?></i>
                </div>
              </div>
              <div class="postcontent">
                <p><?php echo $post->Body; ?></p>
                <img src="assets/whitehouse.jpg" />
                <br>
              </div>
                  <div class="d-flex justify-content-around mb-2 review">
                      <a href="#"><i class="far fa-thumbs-up" id="<?php echo $post->PostID; ?>"></i></a>
                      <a href="#"><i class="far fa-comment-alt"></i></a>
                      <button class="Edtbtn" data-toggle="modal" data-target="#myModal" id="<?php echo $post->PostID; ?>">Edit</button>
                      <button class="Delbtn" id="<?php echo $post->PostID; ?>">Delete</button>
                  <?php if ($post->UserID == $_SESSION["U_id"]) {?>

                  <?php } ?>

                  </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- <div class="col-sm-2" id="whitespace">
        </div> -->
      </div>
    </div>
    <div id="imageModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="img">
      <div id="caption"></div>
    </div>
    <div class="site-cache" id="site-cache"></div>
  </body>

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
