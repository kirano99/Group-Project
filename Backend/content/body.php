<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    while ($mem = mysqli_fetch_object($result)) {
        $POSTS[] = $mem;
    }

    $comes = $conn->query("SELECT COMMENTS.CommentText, COMMENTS.DateTimeCommented, COMMENTS.PostID, COMMENTS.UserID FROM COMMENTS");

    while ($mem2 = mysqli_fetch_object($comes)) {
        $COMMENTS[] = $mem2;
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
            <div class= "post">
            <form>
                <div class="form-group shadow-textarea">
                  <textarea id="post_txt" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="What you thinking..."></textarea>
                </div>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
                <input id="post_btn" type="submit" class="btn btn-primary" value="Post" style="float:right">
            </form>
          </div>

        <div id="PostAck"></div>
        
        <?php foreach($POSTS as $post): ?>
        <div class="post">
            <div class="userdetails">
              <div class="accountimage">
                  <img src="assets/account1.jpg" class="rounded" />
              </div>
              <div class="accountname">
                <h4><?php echo $post->fname; ?> <?php echo $post->lname; ?></h4>
              </div>
              <div class="postdatetime">
                <i><?php echo $post->DatePosted; ?></i>
              </div>
            </div>
            <div class="postcontent">
              <p><?php echo $post->Body; ?></p>
              <img src="" />
              <br>
            </div>
                <div class="d-flex justify-content-around mb-2 review">
                    <button class="likeBtn postButtons" id="<?php echo $post->PostID; ?>"><i class="likeBtn far fa-thumbs-up"></i></button>
                    <p><?php echo $post->likes; ?></p>
                    <a href="#"><i class="far fa-comment-alt"></i></a>
                <?php if ($post->UserID == $_SESSION["U_id"]) {?>
                    <button class="Edtbtn btn btn-primary" data-toggle="modal" data-target="#myModal" id="<?php echo $post->PostID; ?>">Edit</button>
                    <button class="Delbtn btn btn-primary" id="<?php echo $post->PostID; ?>">Delete</button> 
                <?php } ?>
                    
                </div>
                    <?php ?>
                        <p><?php $post->comment; ?></p>
                    <?php ?>
          </div>
        <?php endforeach; ?>
    </div>
        
        <!-- Modal -->
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
    </div>
    
        <div class="modal fade" id="myComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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