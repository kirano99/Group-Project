 <!DOCTYPE html>
<html>
<body>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Chris Page">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Social Network</title>
</head>
    
    <div class="container-fluid" style="margin-top:30px">
      <div class="row">
        <div class="col-sm-3 whitespace">
        </div>
        <div class="col-sm-6 signinform">
          <img alt="logo" src="assets/LogoAlt.png">
          <br>
          <br>
            <div class="row">
                
              <div class="col">
                <h2>Sign In</h2>
                <br>
                <form id="myLogin">
                  <div class="form-group">
                    <label for="email">Email/Username:</label>
                    <input type="text" class="form-control" id="studentid" placeholder="Enter email or username" name="studentid">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="pswd">
                  </div>
                 
                  <button id="LogBtn" type="submit" class="btn btn-primary">Sign In</button>
                </form>
                <div id="ack"></div>
              </div>
                
            
              <div class="col">
                <h2>Sign Up</h2>
                <br>
                <form id="myCreate">
                  <div class="form-group">
                    <label for="email">Username(Student ID):</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input  type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Confirm Password:</label>
                    <input type="password" class="form-control" id="password2" placeholder="Confirm password" name="pswd">
                  </div>
                  <button id="CreateBtn" type="submit" class="btn btn-primary">Sign Up</button>
                </form>
                <div id="CreateAck"></div>
              </div>
                
            </div>
        </div>
        <div class="col-sm-3 whitespace">
        </div>
      </div>
    </div>
    <div class="site-cache" id="site-cache"></div>
    
    
<section class="footer">
    <div class="container">
        <h2>Contact us</h2>
        <p>Email: SwanHub@students.ac.uk</p>
        <p>University Of Lincoln</p>
    </div>
</section>
    
</body>
</html> 