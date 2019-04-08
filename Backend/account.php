
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
        <div class="container-fluid profile">
          <div class="row">
            <div class="col-sm-2 links">
              <img src="assets/account1.jpg" alt="Account" class="rounded profileimage" >
              <!-- <div style= "margin:10px">
                  <button type="button" class="btn btn-primary" style= "margin:10px">Edit</button>
                  <button type="button" class="btn btn-primary" style= "margin:10px" >Friends</button>
                    <button type="button" class="btn btn-primary" style= "margin:10px">Photos</button>
              </div> -->
              <h3>Ronald McDonald Trump</h3>
              <ul class="nav nav-pills flex-column">
                <?php
                  if(isset($_SESSION["U_id"]))
                  {
                      echo '<button id="logout" class="btn btn-primary">Logout</button>';
                  }
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="EditProf.php">Edit Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="courses.php">Computer Science</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link">Year 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="socs.php">Computer Science Society</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="friends.php">Friends</a>
                </li>
              </ul>
              <hr class="d-sm-none">
            </div>

            <div class="col-sm-8">
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
        <!-- The Modal -->
        <div id="imageModal" class="modal">
          <span class="close">&times;</span>
          <img class="modal-content" id="img">
          <div id="caption"></div>
        </div>
      <!--</div>  STRAY TAG ????-->
        <div class="site-cache" id="site-cache"></div>
  </body>

  <!-- Optional JavaScript -->
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
