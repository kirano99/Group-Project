
<div class="container">
    <form id="myForm" action="includes/check.php" method="post">
        <input name="studentid"  id="studentid" type="text" placeholder="Enter Student ID"/>
        <input name="password" id="password" type="password" placeholder="Enter Password"/>
    <button id="submit">Login</button>
    </form>

    <div id="ack"></div>

    <form id="myCreate">
        <input name="email" id="email" type="text" placeholder="Student Email"/>
        <input name="username" id="username" type="text" placeholder="Student ID"/>
        <input name="password2" id="password2" type="password" placeholder="Enter Password"/>
        <button id="CreateSub">Create Account</button>
    </form>
    <div id="CreateAck"></div>
</div>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesheet.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
    <title>Social Network</title>
  </head>
  <body>
    <div class="container-fluid" style="margin-top:30px">
      <div class="row">
        <div class="col-sm-3 whitespace">
        </div>
        <div class="col-sm-6 signinform">
          <img alt="logo" src="assets/LogoAlt.png">
          <br>
          <br>
          <form>
            <div class="row">
              <div class="col">
                <h2>Sign In</h2>
                <br>
                <form action="/action_page.php">
                  <div class="form-group">
                    <label for="email">Email/Username:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                  </div>
                  <div class="form-group form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary">Sign In</button>
                </form>
              </div>
              <div class="col">
                <h2>Sign Up</h2>
                <br>
                <form action="/action_page.php">
                  <div class="form-group">
                    <label for="email">Username(Student ID):</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Confirm Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Confirm password" name="pswd">
                  </div>
                  <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
              </div>
            </div>
          </form>
        </div>
        <div class="col-sm-3 whitespace">
        </div>
      </div>
    </div>
    <div class="site-cache" id="site-cache"></div>
  </body>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
  </html>
