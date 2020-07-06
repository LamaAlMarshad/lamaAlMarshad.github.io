<?php
		ob_start();
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
	    
	    	//Insert to DB
		$name = $_POST['Name'];
	    	if ( $name == "Forwards") {
			$sql = "INSERT INTO Buttons (Forwards)
			VALUES ('F')";	
		}
	    	else if ( $name == "Backwards") {
			$sql = "INSERT INTO Buttons (Backwards)
			VALUES ('B')";	
		}
	    	else if ( $name == "Left") {
			$sql = "INSERT INTO Buttons (`Left`)
			VALUES ('L')";	
		}
	    	else if ( $name == "Right") {
			$sql = "INSERT INTO Buttons (`Right`)
			VALUES ('R')";	
		}
	    	else if ( $name == "Stop") {
			$sql = "INSERT INTO Buttons (Stop)
			VALUES ('S')";	
		}
	    	
		if ($conn->query($sql) === TRUE) {
		header("Location: http://localhost:8000/ViewFromDB.php"); exit;

		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
		ob_end_flush();
?>	
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
	    
	    <div class="content">
		    <h1>Welcome to Robot Control Dashboard</h1>
		    <p>
			<strong> use beleow buttons to move the Robot </strong> 
		    </p>
		    
		    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" class="forward" >
			<input id="N" type="hidden" name="Name" value="Forwards">
			<input type="submit" value="Forwards">
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-skip-forward-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
				<path d="M7.596 8.697l-6.363 3.692C.693 12.702 0 12.322 0 11.692V4.308c0-.63.693-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
				<path d="M15.096 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.693-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
			    </svg>
		    </form>
		    
		    
		    <div class="row">
  			<div class="column side" >
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" class="left">
					<input id="N" type="hidden" name="Name" value="Left">
					<input type="submit" value="Left" >
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.646 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L6.207 7.5H11a.5.5 0 0 1 0 1H6.207l2.147 2.146z"/>
					</svg>
				</form>
			    </div>
			    
			    <div class="column middle" >
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>">
					<input id="N" type="hidden" name="Name" value="Stop">
					<input type="submit" value="Stop">
					<img src="https://img.icons8.com/pastel-glyph/28/000000/stop-sign.png"/>
				    </form>
			    </div>
			    
			    <div class="column side" >
				    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>"  class="right" >
					    <input id="N" type="hidden" name="Name" value="Right">
					    <input type="submit" value="Right">
					    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-8.354 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z"/>
					    </svg>
				    </form>
			    </div>
		    </div>
		    
		    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" class="forward">
			<input id="N" type="hidden" name="Name" value="Backwards">
			<input type="submit" value="Backwards">
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-skip-backward-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V4a.5.5 0 0 0-.5-.5z"/>
				<path d="M.904 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.692-1.01-1.233-.696L.904 7.304a.802.802 0 0 0 0 1.393z"/>
				<path d="M8.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L8.404 7.304a.802.802 0 0 0 0 1.393z"/>
			    </svg>
		    </form>
	    </div>
	    
	    <div class="footer">
		    <p>©2020 Smart Methods</p>
	    </div>
        
	    
	    
    </body>
</html>