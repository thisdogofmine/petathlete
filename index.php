<?php
require_once("nav_bar.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-8">
		<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
		<META http-equiv="Expires" content="Tue, 20 Aug 1996 14:25:27 GMT">
		
		<title>PetAthlete</title>
		
		<script>
			<?
			//<script src="js/dog.js"></script>
			
			include('js/dog.js');
			?>


		</script>
		<script type="text/javascript" src="js/datepickercontrol.js"></script>
		
		<style>
			<?
			include('css/dog.css');
			include('css/menu.css');
			//<link type="text/css" rel="stylesheet" href="dog.css">
			?>
		</style>
		<link type="text/css" rel="stylesheet" href="css/datepickercontrol.css">
		
	</head>
	
	<body>
		<input type="hidden" id="DPC_TODAY_TEXT" value="today">
		<input type="hidden" id="DPC_BUTTON_TITLE" value="Open calendar...">
		<input type="hidden" id="DPC_MONTH_NAMES" value="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']">
		<input type="hidden" id="DPC_DAY_NAMES" value="['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']">
		
		
		
		<div class="header">
			<h1>Pet Athlete: The home for pet sports</h1>
		</div>
		
		<div id="nav"  class="navbar" style='z-index:2001;' >
			<? dash($selected_menu_group); ?>
		</div>

		<div class="main" >
			<span class="side_list">
				<!--div class="bone" onclick=changephoto('ivan');>Ivan</div>
				<br-->
				<img src="images/bone_ivan.jpg" alt="Ivan" onclick=changephoto('ivan');><br>
				<img src="images/bone_temporary.jpg" alt="Temporary" onclick=changephoto('tempy');><br>
				<img src="images/bone_rio.jpg" alt="Rio" onclick=changephoto('rio');><br>
				<img src="images/bone_callie1.jpg" alt="Callie" onclick=changephoto('callie');><br>
				<img src="images/bone_abby.jpg" alt="Abby" onclick=changephoto('abby');><br>
				<img src="images/bone_ajax.jpg" alt="Ajax" onclick=changephoto('ajax');><br>
				<img src="images/bone_benji.jpg" alt="Benji" onclick=changephoto('benji');><br>
				<img src="images/bone_stella.jpg" alt="Stella" onclick=changephoto('stella');><br>
				
			</span>
			
			<span class="ivan">
				<div id=main>
					Click on bone to see dog.
				</div>
			</span>
			
			<span class="side_list">
				<img src="images/bone_rocket.jpg" alt="Rocket" onclick=changephoto('rocket');><br>
				<img src="images/bone_snoopy.jpg" alt="Snoopy" onclick=changephoto('snoopy');><br>
				<img src="images/bone_kisses.jpg" alt="Kisses" onclick=changephoto('kisses');><br>
				<img src="images/bone_petey.jpg" alt="Petey" onclick=changephoto('petey');><br>
				<img src="images/bone_laska.jpg" alt="Laska" onclick=changephoto('laska');><br>
				<img src="images/bone_herbie.jpg" alt="Herbie" onclick=changephoto('herbie');><br>
				<img src="images/bone_jasper.jpg" alt="Jasper" onclick=changephoto('jasper');><br>
				<img src="images/bone_freckles.jpg" alt="Freckles" onclick=changephoto('freckles');><br>
				
			</span>
		</div>
		
		<div class="rio">
			<br>
			<hr>
				<img src="images/bone2.jpg" alt="bone">
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