<?php
session_start();
if((isset($_SESSION["username"]))){
} 
else{
    header("Location:admin.php");
}
?>
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
			$(document).ready(function()
			{
				$("#show1").click(function()
				{
					$("#hideit").toggle(1000);
				});
			});
		</script>
	</head>
	<body>
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
        
		<div id="container-fluid" class="toppad">
		<div class="alert alert-info col-xs-12 textcenter  shadow ">
		Please go through this before uploading event.
		<ul><li>First Give a suitable name of the event</li>
		<li>Add proper description of the event</li>
		<li>Choose Total number of images that you want to upload(max 10)</li> 
		<li>Upload those images</li> 
		<li>Upload images only in JPG format, you might face glitches if other formats are uploaded, Convert your images to JPG if necessary.</li>
		</ul>
		</div>
			<div id="row" class="alignform">
				<form method="POST" action="submitnewevent.php" enctype="multipart/form-data">
				<div class="form-group">
						<label for="event_title1">Event Name:</label>
						<input required type="text" name="event_title1" id="event_title1" class="col-xs-10 col-xs-offset-1 form-control" placeholder="Name of event">
				</div>
				<div class="form-group">
						<label for="event_about1">Event Description:</label>
							<textarea required name="event_about1" id="event_about1" class="col-xs-10 col-xs-offset-1 form-control" placeholder="Description of event"></textarea>
				</div>
				<div class="form-group">
						<label for="event_img">Choose Number of Images to upload(Maximum 10):</label>
							<input required type="Number" name="event_img1" id="event_img" class="col-xs-10 col-xs-offset-1 form-control" min=1 max=10 onblur="addtags();" placeholder="Number of images to upload">
				</div>
						<div class="row clear-fix" id="uploadimg">
						</div>
						<br/>
						<center>
						<div class="col-xs-10 col-xs-offset-1">
						<button type="submit" class="btn btn-default">Submit</button>
						</div>
						</center>
				</div>
				</form>
			</div>
		</div>
		<script>
			function addtags()
			{
				var total=document.getElementById("event_img").value;
				var addimg=document.getElementById("uploadimg");
				 while (addimg.hasChildNodes()) 
				{
                	addimg.removeChild(addimg.lastChild);
            	}	
                 for (i=1;i<=total;i++)
                 {
                    addimg.appendChild(document.createTextNode("Image " + i));
	                var ipt = document.createElement("input");
	                ipt.type = "file";
	                ipt.name = "img"+ i;
	                ipt.class="col-xs-10 col-xs-offset-1 clear-fix";
	                addimg.appendChild(ipt); 
	                addimg.appendChild(document.createElement("br"));
		//            document.getElementById("uploadimg").appendChild(ipt);
            }
			}
		</script>
	</body>
</html>
