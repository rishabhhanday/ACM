
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
   </head>
    <body>
    <?php
      include 'dbinit.php';
    ?>
        <nav class="navbar navbar-default navbar-cus navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand" style="color:white">ACM</a>
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
 <div id="toppad"></div>

 <!--Events hai ye -->
<?php
  $id=$_GET['page'];
  $totrowq=mysqli_query($dbc,'SELECT count(sno) FROM EVENTS')or die(mysqli_error($dbc));
  $total_img=0;
  while($row=mysqli_fetch_array($totrowq))
  {
    $totrow=$row['count(sno)'];
  }
  $id=$totrow-$id+1;
  $id=$id<0?$id*-1:$id;
  $qu=mysqli_query($dbc,'SELECT * FROM `EVENTS` WHERE sno='.(int)$id)or die(mysqli_error($dbc)) ;
  while($row_img=mysqli_fetch_array($qu))
 {	 
 	$total_img=$row_img['event_img'];
  	$event_title=$row_img['event_title'];
  	$event_about=$row_img['event_about'];
  }
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
     <center> <img src=<?php echo "img/event",($id),"_1.jpg";?> class="img-responsive imgevents"></center>
      <div class="carousel-caption">
        <h3>ACM</h3>

      </div>
    </div>
    <?php for($i=2;$i<=$total_img;$i++)
      {
        echo'
        <div class="item">
          <center><img src="img/event',$id,'_',$i,'.jpg" class="img-responsive imgevents"></center>
          <div class="carousel-caption">
            <h3>ACM</h3>
          </div>
        </div>
        ';
      }
      echo '</div>';
    ?>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
</div>
        <div class="container-fluid">
            <div class="row" style="background-color: #f3f3f3;box-shadow: 8px 10px 10px #999">
            <br><br>
            <center><h1><?php echo $event_title?></h1></center>
              <div class="col-xs-2">
              <a href=<?php 
              $ido=$_GET['page'];
              if($ido==1)
                  $ans=$totrow;
              else
                  $ans=$ido-1;
              echo'events.php?page='.$ans;?>>
            <img src="img/pre.png" class="img-responsive">
            </a>
            </div>
            <div class="col-xs-8">
            <br>
              <center>  <p><?php echo $event_about?></p></center>
            </div>
          <div class="col-xs-2">
          <a href=<?php
            $ido=$_GET['page'];
            if($ido==$totrow)
              $ans=1;
            else
              $ans=$ido+1;
            echo "events.php?page=".$ans;
          ?>>
          <img src="img/next.png" class="img-responsive">
          </a>
          </div>
          </div>
            </div>
    </body>
</html>
