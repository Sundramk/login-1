<?php
	$Name = $_POST['user'];
	$Email = $_POST['email'];
	$Number = $_POST['number'];
	$Address = $_POST['address'];
	$Date = $_POST['date'];

	// Database connection
	$conn = new mysqli('localhost','root','','sund');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into sir(user, email, number, address, date) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssisi", $Name, $Email, $Number, $Address, $Date);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>