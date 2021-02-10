<?php

$servername = "localhost";
$username = "whatare_01";
$password = "Wilddog.01";
$db = "whatare_new";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$sql = "Select * from dog_list";

$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo " id: {$row['id']} - {$row['dog_name']} - dob: {$row['dob']} -weight: {$row['weight']} <br>";
		
	}
}else{
	echo 'no results';
}
$conn->close();

?>
<html>
	<head>
		<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-8">
		<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
		<META http-equiv="Expires" content="Tue, 20 Aug 1996 14:25:27 GMT">
		
		<script src="dog.js"></script>
		<script type="text/javascript" src="datepickercontrol.js"></script>
		<style>
		<?
		include('dog.css');
		//<link type="text/css" rel="stylesheet" href="dog.css">
		
		?>
		</style>
		<link type="text/css" rel="stylesheet" href="datepickercontrol.css">
		
	</head>
	
	<body>
		<input type="hidden" id="DPC_TODAY_TEXT" value="today">
		<input type="hidden" id="DPC_BUTTON_TITLE" value="Open calendar...">
		<input type="hidden" id="DPC_MONTH_NAMES" value="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']">
		<input type="hidden" id="DPC_DAY_NAMES" value="['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']">
		<div class="header">
			<h1>The Dogs New</h1>
		</div>
		<div class="main" >
			<span class="side_list">
				<div class="bone" onclick=changephoto('ivan');>Ivan</div>
				<br />
				<img src="bone_temporary.jpg" alt="Temporary" onclick=changephoto('tempy');><br />
				<img src="bone_rio.jpg" alt="Rio" onclick=changephoto('rio');><br />
				<img src="bone_callie1.jpg" alt="Callie" onclick=changephoto('callie');>
				<img src="bone_abby.jpg" alt="Abby" onclick=changephoto('abby');><br />
				<img src="bone_ajax.jpg" alt="Ajax" onclick=changephoto('ajax');><br />
				<img src="bone_benji.jpg" alt="Benji" onclick=changephoto('benji');>
				<img src="bone_stella.jpg" alt="Stella" onclick=changephoto('stella');>
				
			</span>
			
			<span class="ivan">
				<div id=main>
					Click on bone to see dog.
				</div>
			</span>
			
			<span class="side_list">
				<img src="bone_rocket.jpg" alt="Rocket" onclick=changephoto('rocket');><br />
				<img src="bone_snoopy.jpg" alt="Snoopy" onclick=changephoto('snoopy');><br />
				<img src="bone_kisses.jpg" alt="Kisses" onclick=changephoto('kisses');><br />
				<img src="bone_petey.jpg" alt="Petey" onclick=changephoto('petey');>
				<img src="bone_laska.jpg" alt="Laska" onclick=changephoto('laska');><br />
				<img src="bone_herbie.jpg" alt="Herbie" onclick=changephoto('herbie');><br />
				<img src="bone_jasper.jpg" alt="Jasper" onclick=changephoto('jasper');>
				<img src="bone_freckles.jpg" alt="Freckles" onclick=changephoto('freckles');>
				
			</span>
		</div>
		
		<div class="rio">
			<br>
			<hr>
				<img src="bone2.jpg" alt="bone">
			<hr>
		</div>
		
		<div class="rio">
			<form name="myForm">
				Name: <input type="text"
				onkeyup="ajaxFunction();" name="username" />
				Time: <input type="text" name="time" />
			</form>
			
			<form>
				date select:
				<input type="text" name="txt1" id="txt1" datepicker="true" datepicker_format="MM-DD-YYYY" />
			</form>
			<a href=/weather.php>weather</a>
			<p>Suggestions: <span id="txtHint"></span></p>
			
			<hr>
			
			<table name = "area2"  border="0" width="100%" cellpadding="1">
				<tr name = "body">
					<td>
					</td>
				</tr>
			</table>
		</div>
	<?php
	?>
	</body>
</html>