<?php  
	include "dbinit.php";
	$event_title2=$_POST['event_title1'];
	$event_about2=$_POST['event_about1'];
	$event_img2=$_POST['event_img1'];
  	$qu=mysqli_query($dbc,'SELECT count(sno) FROM EVENTS')or die(mysqli_error($dbc));
  	$total_img=0;
  	$totrow=0;
  	while($row=mysqli_fetch_array($qu))
  	{
   	 	$totrow=$row['count(sno)'];
  	}
 	$event_id2="event".(string)(1+$totrow);
	$totrow+=1;
	$sql ="INSERT INTO EVENTS VALUES ($totrow,'$event_id2','$event_title2','$event_about2','$event_img2')";
	$qu=mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
	$i=1;
	while($i<=$event_img2)
	{
		$mv=move_uploaded_file($_FILES['img'.$i]['tmp_name'], "img/event".$totrow."_".$i.(string)'.jpg');
		echo $mv;	
		$i+=1;
	}
	echo "Succesfull Upload";
?>