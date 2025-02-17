
<?php
session_start();
//testing session id and picking up variable
//echo session_id();
//echo "Hello world book!<br>";

echo $_SESSION['user']['username'];	




//bootstrap3 template
$mysqli = new mysqli('localhost', 'root', '', 'registration2');
if(isset($_GET['date'])){
    $date = $_GET['date'];
	
	$stmt=$mysqli->prepare('select*from bookings where date =?');
	$stmt->bind_param('s',$date);
	$bookings=array();
	if($stmt->execute()){
	$result=$stmt->get_result();
	if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$bookings[]=$row['timeslot'];
	}
	$stmt->close();
	}
}
}

if(isset($_POST['submit'])){
	

$event = $_POST['event'];
/*
$email = $_POST['email'];
*/	
	

$timeslot=$_POST['timeslot'];

$stmt = $mysqli->prepare("INSERT INTO bookings (timeslot,date,event) VALUES (?,?,?)");
$stmt->bind_param('sss',$timeslot,$date,$event);
$stmt->execute();
$msg = "<div class='alert alert-success'>Booking Successfull</div>";
$bookings[]=$timeslot;
$stmt->close();

$stmt = $mysqli->prepare("INSERT INTO test (timeslot,date,username,event) VALUES (?,?,?,?)");
$stmt->bind_param('ssss',$timeslot,$date,$_SESSION['user']['username'],$event);
$stmt->execute();

$mysqli->close();
}
// create appointments 70min Apart

$duration=70;
$cleanup=0;
$start="10:00";
$end="17:00";

function timeslots($duration,$cleanup,$start,$end){
$start=new DateTime($start);
$end=new DateTime($end);
$interval=new DateInterval("PT".$duration."M");
$cleanupInterval=new DateInterval("PT".$cleanup."M");
$slots=array();

for($intStart=$start;$intStart<$end;$intStart->add($interval)->add($cleanupInterval)){
	$endPeriod=clone $intStart;
	$endPeriod->add($interval);
	if($endPeriod>$end){
		break;
	}
	$slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");
}
	return $slots;
}

?>

<!doctype html>

<html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="/css/main.css"> 

</head>

 <body>
  <div class="container">
    <h1 class="text-center">Book Personal Shopping <?php echo date('m/d/Y',strtotime($date)); ?></h1><hr>
      <div class="row">
		<div class="col-md-12">
		<?php echo isset($msg)?$msg:"";?>
		</div>
		
	  <?php $timeslots=timeslots($duration,$cleanup,$start,$end);
	  foreach($timeslots as $ts){
		  
		  ?>
		  <div class="col-md-2">
		  <div class="form-group">
		  <?php if(in_array($ts,$bookings)){ ?>
		  <button class="btn btn-danger"><?php echo $ts;?></button>	
		  <?php }else{ ?>
		  <button class="btn btn-success book"data-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button>	
		  <?php } ?>
		  
		  
		  
		  
		
		  </div>
		  </div>  	 	  
	  <?php } ?>
	  
       
     </div>
	 
	 
	 
	 
	 
    </div>
	
	
	
	
	
	<!--Bootstrap Model code from w3schools ->
	
<!-- Modal -->
<div id="myModal"class="modal fade"role="dialog">
  <div class="modal-dialog">
  
  
  
  
  

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking:<span id="slot"></span></h4>
      </div>
	  
	  
	  
	  
	  
      <div class="modal-body">
        <div class="row">
		<div class="col-md-12">
		<form action=""method="post">
		
		<div class="form-group">
		<label for="">Timeslot</label>
		<input required type="text"name="timeslot"id="timeslot"class="form-control">
      </div>
	 
	  <div class="form-group">
		<label required type="">Event</label>
		<input type="text"name="event"class="form-control">
      </div>
	  <!-- 
	  <div class="form-group">
		<label for="">Email</label>
		<input required type="email"name="email"class="form-control">
		</div>
		
		-->
		
		<div class="form-group pull-right">
		<button class="btn btn-primary"type="submit"name="submit">Submit</button>
	
		
		
      </div>
	  </form>
	  
	 
	  
	  
	  
	  
	  </div>
	  </div>
	  </div>
      
	  
    </div>

  </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
	<script>
	$(".book").click(function(){
		var timeslot=$(this).attr('data-timeslot');
		$("#slot").html(timeslot);
		$("#timeslot").val(timeslot);
		$("#myModal").modal("show");
		
	})
	
	</script>
	
	
	
  </body>

</html>
