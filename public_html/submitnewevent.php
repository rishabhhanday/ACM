<!DOCTYPE html>
<html>
    <head>
	       <meta charset="utf-8">
	        <title>ACM</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <link rel="stylesheet" href="css/style.css">
	  <script>
	$(document).ready(function(){
	    $("#show1").click(function(){
	        $("#hideit").toggle(1000);
	    });
	    
	});
	</script>
 	</head>
 	<body>
<?php  
	include "dbinit.php";
	$event_title2=$_POST['event_title1'];
	$event_about2=$_POST['event_about1'];
	$event_img2=$_POST['event_img1'];
  	$qu=mysqli_query($dbc,'SELECT count(sno) FROM EVENTS')or die("There was some issue while connecting to server please try again.");
  	$total_img=0;
  	$totrow=0;
  	while($row=mysqli_fetch_array($qu))
  	{
   	 	$totrow=$row['count(sno)'];
  	}
 	$event_id2="event".(string)(1+$totrow);
	$totrow+=1;
	$sql ="INSERT INTO EVENTS VALUES ($totrow,'$event_id2','$event_title2','$event_about2','$event_img2')";
	$i=1;
	while($i<=$event_img2)
	{
		$mv=move_uploaded_file($_FILES['img'.$i]['tmp_name'], "img/event".$totrow."_".$i.(string)'.jpg');
		$i+=1;
		if($mv==0)
			break;
	}
	if($mv==1)
		$qu=mysqli_query($dbc,$sql) or die("Some issue occured while connecting to server please try again.");
	if($qu==1)
	{
		echo '
<nav class="navbar navbar-default navbar-cus navbar-fixed-top">
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
                <li><a href="events.php?page=1">Events</a></li>
                <li><a href="about.html">Our Team</a></li>
                <li><a href="http://www.medicaps.ac.in">Medicaps University</a></li>
            </ul>
            <br><br></div>
            
        </div>
        
    </nav>
    <div class="container-fluid toppad">
      <div class="row">
        <div class="panel-group textcenter">
          <div class="panel panel-success">
            <div class="panel-heading">Upload Succesfull</div>
            <div class="panel-body">Event has been Succesfully uploaded.</div>
          </div>
        </div>
      </div>
    </div>
		';
	}
	mysqli_close($dbc);
?>
</body>
</html>
