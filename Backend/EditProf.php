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
        <div class="col-sm-3 whitespace">
        </div>
        <div class="col-sm-6">
         
        <form id="myBio">    
          <div class= "post">
            <h4>Edit Bio</h4>
            <?php foreach($USER_PROFILE as $info): ?>
            <div class="form-group shadow-textarea">
              <textarea id="BioTxt" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Edit your bio..."><?php echo $info->About; ?></textarea>
              <br>
              <input id="BioBtn" type="submit" class="btn btn-primary" value="Post" style="float:right; margin:2px">
              <br>
            </div>
            <div id="ack"></div>
          </div>
        </form>
            
          <div class="post">
            <h2>Update Details</h2>
            <br>
                <form id="myAccount">
                  <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" value="<?php echo $info->First_Name; ?>" >
                  </div>
                    
                  <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname" placeholder="Enter lastname" name="lname" value="<?php echo $info->Last_Name; ?>" >
                  </div>
                    
                  <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="<?php $info->DOB; ?>" >
                  </div>
                    
                  <div class="form-group">
                    <label for="courselist">Course:</label>
                    <select class="form-control" id="clist" name="courselist">
                        <option value="compsci">Computer Science</option>  
                        <option value="games">Games</option>
                        <option value="fineart">Fine arts</option>
                    </select>
                  </div>
                    
                  <div class="form-group">
                      
                    <div class="col-sm-8">
                      <div class= "post">
                    </div>
                     <?php endforeach; ?> 
                  <br>
                  <button id="AccBtn" type="submit" class="btn btn-primary">Submit</button> 
                </div>
            </form>
            <form action="includes/image.php" method="post" enctype="multipart/form-data">
                          <input type="file" name="file" id="file">
                          <input type="submit" class="btn btn-primary" value="Upload" name="submit">
                      </form>
              
        <div class="col-sm-3 whitespace">
        </div>
      </div>
            
    </div>
    <div class="site-cache" id="site-cache"></div>

    <script>
      /*
      $('select').selectpicker();
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
  */
    </script>
<?php
  require 'content/footer.php';        
?>
