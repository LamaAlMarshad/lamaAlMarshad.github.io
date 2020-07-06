<!DOCTYPE html >

<html>
    <head>
        <meta charset="utf-8">
        <title>Robot Control</title>
        <link rel="stylesheet" type="text/css"
	    href = "styleSheet.css">
    </head>

	<body>
		<div class="topnav">
		  <a href="http://localhost:8000/RobotControl.php">
			  Home
			  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
				  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
			  </svg>
		    </a>
		  
	    </div>
		
		<h1>Welcome to Robot Control Dashboard</h1>
		<?php
			$servername = "192.168.64.2";
				$username = "lama";
				$password = "9900";
				$dbname = "Robot_Control";
		
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				  die("Connection failed: " . $conn->connect_error);
				}
				//Read from DB
				$sql = "SELECT * FROM Buttons ORDER BY ID DESC LIMIT 1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$row =  $result->fetch_assoc();
					if ($row["Forwards"] != "") {
						echo "<p> <strong>".  $row["Forwards"] ."</strong> </p>";
					}
					else if ($row["Backwards"] != "") {
						echo "<p> <strong>". $row["Backwards"] ."</strong> </p>";
					}
					else if ($row["Left"] != "") {
						echo "<p> <strong>".  $row["Left"] ."</strong> </p>";
					}
					else if ($row["Right"] != "") {
						echo "<p> <strong>". $row["Right"] ."</strong> </p>";
					}
					else if ($row["Stop"] != "") {
						echo "<p> <strong>". $row["Stop"] ."</strong> </p>";
					}
				}
				else {
				  echo "0 results";
				}
				$conn->close();
		?>
	</body>
</html>