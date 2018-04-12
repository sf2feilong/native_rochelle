<?php
include 'db.php';
?>
<style>
	table{
		background-color: #000000;
	}
</style>
<html>
	<body>
		<center>
		<table border="1" solid green>
			<form method="post">
				<tr>
					<td>Event Name:</td>
					<td><input type="text" id="event_name" name="event_name"></td>
				</tr>
				<tr>
					<td>Theme:</td>
					<td><input type="text" id="event_theme" name="event_theme"></td>
				</tr>
				<tr>
					<td>Location:</td>
					<td><input type="text" id="event_location" name="event_location"></td>
				</tr>
				<tr>
					<td>Time (HH-MM):</td>
					<td>
						<select id="event_time_hour" name="event_time_hour">
							<option>HH</option>
							<option value="00">00</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
						</select>
						<select id="event_time_minute" name="event_time_minute">
							<option>MM</option>
							<option value="00">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Date (YYYY-MM-DD):</td>
					<td>
						<select id="event_date_year" name="event_date_year">
							<option>YYYY</option>
							<?php
								$current_year = date("Y");
								$counter = $current_year;
								while($counter > ($current_year - 100)){
									echo '
										<option value="';
										echo $counter; echo'">'; 
										echo $counter; echo '</option>
									';
									$counter = $counter - 1;
								}
							?>
						</select>
						<select id="event_date_month" name="event_date_month">
							<option>MM</option>
							<option value="01">01</option>;
							<option value="02">02</option>;
							<option value="03">03</option>;
							<option value="04">04</option>;
							<option value="05">05</option>;
							<option value="06">06</option>;
							<option value="07">07</option>;
							<option value="08">08</option>;
							<option value="09">09</option>;
							<option value="10">10</option>;
							<option value="11">11</option>;
							<option value="12">12</option>;
						</select>
						<select  id="event_date_day" name="event_date_day">
							<option>DD</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit" id="event_submit" name="event_submit">Submit</button></td>
				</tr>
			</form>
		</table>
		</center>
		<div id="result">
			<p></p>
		</div>
	</body>
</html>

<?php
	if(isset($_POST['event_submit'])){
		$name = $_POST['event_name'];
		$theme = $_POST['event_theme'];
		$location = $_POST['event_location'];
		$hour = $_POST['event_time_hour'];
		$minute = $_POST['event_time_minute'];
		$year = $_POST['event_date_year'];
		$month = $_POST['event_date_month'];
		$day = $_POST['event_date_day'];


		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO event_t (event_id, event_name, event_theme, event_location, event_time, event_date, event_status) VALUES (?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssss", $event_id, $event_name, $event_theme, $event_location, $event_time, $event_date, $event_status);

		// set parameters and execute
		$event_id = "";
		$event_name = $name;
		$event_theme = $theme;
		$event_location = $location;
		$event_time = $hour.$minute."00";
		$event_date = $year."-".$month."-".$day;
		$event_status = 'active';
		
		if(!$stmt->execute()){
			echo "Unsuccessful<br>";
		}else{
			echo "Successfully created event<br>";
		}

		
		


	}

	
?>