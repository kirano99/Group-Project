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
            <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" value="<?php echo $info->First_Name; ?>" required>
          </div>

          <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" id="lname" placeholder="Enter lastname" name="lname" value="<?php echo $info->Last_Name; ?>" required>
          </div>

          <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php $info->DOB; ?>" required>
          </div>

          <div class="form-group">
            <label for="courselist">Course:</label>
            <select class="form-control" id="clist" name="courselist">
            </select>
          </div>

          <div class="form-group">
            <div class="main-img-preview">
              <img class="thumbnail img-preview" src="http://farm4.static.flickr.com/3316/3546531954_eef60a3d37.jpg" title="Preview Logo">
            </div>

            <div class="input-group">
              <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
              <div class="input-group-btn">
                <div class="fileUpload btn fake-shadow">
                  <span><i class="glyphicon glyphicon-upload"></i> Upload Image</span>
                  <input id="logo-id" name="logo" type="file" class="attachment_upload">
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <br>
            <button id="AccBtn" type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-sm-3 whitespace">
    </div>
  </div>
</div>
<div class="site-cache" id="site-cache"></div>
<?php
  require 'content/footer.php';
?>
