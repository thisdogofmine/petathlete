<?

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
		echo " id: {$row['id']} - {$row['dog_name']} - dob: {$row['dob']} -weight: {$row['weight']} - breed: {$row['breed']} <br>";
	}
}else{
	echo 'no results';
}
$conn->close();

?>