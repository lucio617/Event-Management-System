<?php
	//Connect database
	include "database/connect.php";
	
	//Read session
	include 'session.php';

	//Read button script
	include "top_button.html";
?>

</!DOCTYPE html>
<html>
<head>
	<title>VIT Events</title>
	<style type="text/css">
		a:hover{
			font-size: 24px;
		}
		a{
			color: blue;
		}
		.top{
			text-align: center;
			position: absolute;
  			top: 50%;
  			left: 50%;
  			transform: translate(-50%, -50%);
			font-family: 'Dancing Script', cursive;
			font-size: 40px;
			margin-bottom: 30px;
			color:yellow;
		}
		h1:hover{
			font-size: 86px;
		}
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
		}
		input[type=submit]{
			padding: 12px;
			color: black;
			border: none;
			background-color: #66CDAA;
			font-weight: 900;
			font-family: Times New Roman;
			font-size: 16px;
			text-align: center;
			width: auto;
		}
		input[type=submit]:hover{
			background-color: #20B2AA;
		}
		table{
			margin-left:60px;
			margin-right:60px;
			text-align:justify;
			border-bottom:dashed;
			background-color:#B7E3E4;
		}
		.event_name{
			font-family: Times New Roman;
			border-style: none;
			font-size: 30px;
			margin-top: 10px;
			text-align: center;
			align-items: center;
			width: 100%;
			background-color: grey;
			color:white;
			font-weight: bold;
		}

		
	</style>
</head>
<body background="image\bg.png" >
	<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
	<hr width="auto" size="10" style="background: #808000">
	<img src="image/events.jpg" style="width: 100%;">
	<div class="top">
		<h1>VELLORE INSTITUTE OF TECHNOLOGY Clubs and Chapters Events</h1>
	</div>
	
	<hr width="auto" size="10" style="background: #808000">

	<!--Search event form-->
	<div class="search" style="text-align: center">
		<form action="event_detail.php" method="POST" >
			<input type="text" size="40" name="searchevent" style="border-radius: 32px;" placeholder="Enter event name to search event" style="font-size: 16px;padding: 10px" />
			<input type="submit" name="search" value="Search"/>
		</form>
	</div>
	<hr width="auto" size="4" style="background: #808000">

	<!--Display all event area-->
	<div class="content" align="center" style="color:#66CDAA">
		<?php
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			//Read all event
			$read_DB = "SELECT * FROM event_details ORDER BY EventDate DESC";
			$result = mysqli_query($conn, $read_DB);
			
			//Display all result
			if($result){
    			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    				echo "<form action='event_detail.php' method='POST'><table>";
        			echo "<tr><td><input class ='event_name'  type='text' name='eventname' value='".$row['EventName']."' size=65 readonly></td></tr>";
        			echo "<tr><td><span  style='font-size:16px; color:black'><hr>". $row['EventDescription']."</td></tr>";
        			echo "<tr><td><br></td></tr>";
        			echo "<tr><td style='text-align:center'><input style='border:2px solid black;background:grey; color:white; border-radius:30px; letter-spacing:1px' type='submit' name='more_detail' value='More Details'/></td></tr>";
        			echo "<tr><td><br></td></tr>";
        			echo "</table></form><br>";
    			}
			}
		?>
	</div>
	<?php
	include "mystyles/footer.html";
	?>
</body>
</html>