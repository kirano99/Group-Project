<?php
    while ($mem = mysqli_fetch_object($result)) {
        $POSTS[] = $mem;
    }

    //$artquery = $conn->query("SELECT LIKES.UserID, LIKES");
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
    
    <!-- The Modal -->
      <div id="imageModal" class="">
        <span class="close">&times;</span>
        <img class="modal-content" id="img">
        <div id="caption"></div>
      </div>
    </div>    

    <div class="site-cache" id="site-cache"></div>

    <script>
        //James's Js

        var brand = document.getElementById('logo-id');
        brand.className = 'attachment_upload';
        brand.onchange = function() {
            document.getElementById('fakeUploadLogo').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.img-preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo-id").change(function() {
            readURL(this);
        });
      $( '[data-toggle="tooltip"]' ).each(function() {
        new Tooltip($(this), {
          placement: 'bottom',

        });
      });
    </script>