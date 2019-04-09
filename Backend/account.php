<?php
session_start();

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  

  require 'includes/db.php';
  require 'content/header.php';
  $id = $_SESSION['U_id'];

  $user = $conn->query("SELECT First_Name, Last_Name, Profile_Picture  FROM USER_PROFILE WHERE UserID = '$id' LIMIT 1");

  while ($mem = mysqli_fetch_object($user)) {
    $USER[] = $mem;
  };

  $result = $conn->query("SELECT POSTS.UserID, POSTS.PostID, POSTS.Body, POSTS.DatePosted,
  COUNT(LIKES.LikeID) AS likes, USER_PROFILE.First_Name AS fname, USER_PROFILE.Last_Name AS lname, COMMENTS.CommentText AS comment, MEDIA.MediaInfo AS img
  
  FROM POSTS
  
  LEFT JOIN LIKES
  ON POSTS.PostID = LIKES.PostID
  LEFT JOIN USER_PROFILE
  ON POSTS.UserID = USER_PROFILE.UserID
  LEFT JOIN COMMENTS
  ON POSTS.PostID = COMMENTS.PostID
  LEFT JOIN MEDIA
  ON POSTS.PostID = MEDIA.PostID
  GROUP BY POSTS.PostID
  ");

   while ($mem = mysqli_fetch_object($result)) {
    $POSTS[] = $mem;


};


?>
<div class="container-fluid profile">
  <div class="row">
    <div class="col-sm-2 links">
    <?php foreach($USER as $name): 
        $pimg = 'includes/useimg/'.$name->Profile_Picture;
      ?>
    
      <img src="<?php echo $pimg; ?>" alt="Account" class="rounded profileimage">
      <!-- <div style= "margin:10px">
          <button type="button" class="btn btn-primary" style= "margin:10px">Edit</button>
          <button type="button" class="btn btn-primary" style= "margin:10px" >Friends</button>
            <button type="button" class="btn btn-primary" style= "margin:10px">Photos</button>
      </div> -->
        <h3><?php echo $name->First_Name; ?> <?php echo $name->Last_Name; ?></h3>
      <?php endforeach;?>
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
      <form action="includes/image.php" method="post" enctype="multipart/form-data">
        <div class="form-group shadow-textarea">
          <textarea name="txt" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="What you thinking..."></textarea>
        </div>
          <input type="file" name="file" id="file">
          <input type="submit" class="btn btn-primary" value="Upload" name="submit">
          <input type="submit" class="btn btn-primary" value="Post" style="float:right">
        </form>
    </div>

    <?php foreach($POSTS as $post): 
      if ($post->UserID == $_SESSION["U_id"])
        {
      ?>    
        <div class="post">
            <div class="userdetails">
              <div class="accountimage">
              <?php foreach($USER as $name): 
                $pimg = 'includes/useimg/'.$name->Profile_Picture;
              ?>
                  <img src="<?php echo $pimg; ?>" class="rounded" />
              <?php endforeach; ?>
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
              <?php if($post->img != "") {
                $t = 'includes/useimg/'.$post->img;
                ?>
                <img src="<?php echo $t; ?>"/>
              <?php } ?>
              <br>
            </div>
                <div class="d-flex justify-content-around mb-2 review">
                    <button class="likeBtn postButtons" id="<?php echo $post->PostID; ?>"><i class="far fa-thumbs-up"></i></button>
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
                <?php } ?>
        <?php endforeach; ?>
    </div>
    <!-- <div class="col-sm-2" id="whitespace">
    </div> -->
  </div>
</div>
<!-- The Modal -->

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

<div id="imageModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img">
  <div id="caption"></div>
</div>
<!--</div>  STRAY TAG ????-->
<div class="site-cache" id="site-cache"></div>

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
