<?php
if(isset($_POST['submit'])){
session_start();
$id = $_POST["userName"];
$pass = $_POST["pwd"];
if($id==='medicapsacm' && $pass==='alish'){
    $_SESSION["username"] = $_POST["userName"];
    $_SESSION["logedin"] = true;
    header("Location:addevents.php");	
}
}
?>
<html>
<head>
      
        
       
       <meta charset="utf-8">
        <title>ICANI Medicaps</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="css/style.css">   
    </head>
	
	<body>
	<nav class="navbar navbar-default navbar-cus">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="https://www.acm.org/" class="navbar-brand" style="color:white">ACM</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#div1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="div1" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.html">Home</a></li>
                <li><a href="events.php?id=0">Events</a></li>
                <li><a href="about.html">Our Team</a></li>
                <li><a href="http://www.medicaps.ac.in">Medicaps University</a></li>
            </ul>
            <br><br></div>
            
        </div>
        
    </nav>
	<div class="container-fluid">
		<div class="row">
			<div class=col-md-4></div>
			<div class=col-md-4>
				<form action="" method="POST">
  <div class="form-group">
    <label for="userName">Username:</label>
    <input type="text" class="form-control" name="userName">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd">
  </div>
  
  <input type="submit" class="btn btn-default" value="submit" name="submit">
</form>
			</div>
			<div class=col-md-4></div>
		
		</div>
	
	</div>
		
	</body>
	
	
	</html>