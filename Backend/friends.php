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

  <!-- create white space on left hand side
  <div class="col-sm-1" id="whitespace">
  </div>
  -->

    <div class="col-sm-8">

      <div class="container-fluid profile">
        <div class="post">
          <div class="accountname">
            <h1>Friends</h1>
          </div>
        </div>
      </div>
    <div class="container-fluid profile">
      <div class="row">
        <div class="columnSqu">
          <div class="squarea">
            <img  src="assets/account1.jpg"alt="ProfileImage" onclick="myFunction(this);" class="square">
          </div>
          <button class="btn"><i class="fa fa-trash"></i></button><span>
          <button class="btn"><i class="fa fa-star"></i></button></span>
        </div>
        <div class="columnSqu">
          <div class="squarea">
            <img src="assets/account2.jpg" alt="Profileimage" onclick="myFunction(this);">
          </div>
          <button class="btn"><i class="fa fa-trash"></i></button><span>
            <button class="btn"><i class="fa fa-star"></i></button></span>
        </div>
        <div class="columnSqu">
          <div class="squarea">
            <img src="assets/account3.jpg" alt="ProfileImage" onclick="myFunction(this);">
          </div>
          <button class="btn"><i class="fa fa-trash"></i></button><span>
          <button class="btn"><i class="fa fa-star"></i></button></span>
        </div>
        <div class="columnSqu">
          <div class="squarea">
            <img src="assets/account4.jpg" alt="ProfileImage" onclick="myFunction(this);">
          </div>
          <button class="btn"><i class="fa fa-trash"></i></button><span>
          <button class="btn"><i class="fa fa-star"></i></button></span>
          </div>
      </div>
      <div class="col-sm-2" id="whitespace">
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
  </body>
</html>
