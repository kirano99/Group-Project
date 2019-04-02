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
    <title>Marble Management Systems</title>
</head>

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
    
<section class="footer">
    <div class="container">
        <h2>Contact us</h2>
        <p>Email: SwanHub@students.ac.uk</p>
        <p>University Of Lincoln</p>
    </div>
</section>
    
</body>
</html> 