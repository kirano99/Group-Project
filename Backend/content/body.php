<?php
    while ($mem = mysqli_fetch_object($result)) {
        $POSTS[] = $mem;
    }

    //$artquery = $conn->query("SELECT LIKES.UserID, LIKES");
?>    

<section class="middle">
    <div class="container mt-3">
        <h1>SwanHub</h1>
        
        <form id="MyPost" action="includes/post.php" method="post">
            <input name="post_txt"  id="post_txt" type="text" placeholder="What's on your mind?"/>
            <input name="title_txt" id="title_txt" type="text" placeholder="title"/>

            <button id="post_btn">Post</button>
        </form>
        
        <div id="PostAck"></div>
        
        <?php foreach($POSTS as $post): ?>
            <div>
                <p><?php echo $post->Body; ?></p>
                <button class="likeBtn" id="<?php echo $post->PostID; ?>">Like</button>
                <button class="DisBtn" id="<?php echo $post->PostID; ?>">Dislike</button>
                
                <?php if ($post->UserID == $_SESSION["U_id"]) {?>
                    <button class="Edtbtn" data-toggle="modal" data-target="#myModal" id="<?php echo $post->PostID; ?>">Edit</button>
                    <button class="Delbtn" id="<?php echo $post->PostID; ?>">Delete</button>
                <?php } ?>
            </div>
        <?php endforeach; ?>
        
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
</section>