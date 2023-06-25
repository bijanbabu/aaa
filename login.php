<?php
	// Check if form has been submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    // Retrieve email and password from form
	    $email = $_POST["email"];
	    $password = $_POST["password"];

	    // Connect to MYSQL database
	    $servername = "localhost";
	    $username = "username";
	    $password = "password";
	    $dbname = "database_name";
	    $conn = mysqli_connect($servername, $username, $password, $dbname);

	    // Check connection
	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    // Check if email and password are not empty
	    if (!empty($email) && !empty($password)) {
	        // Hash the password
	        $hashed_password = md5($password);

	        // Prepare SQL query to retrieve user from database
	        $sql = "SELECT * FROM users WHERE email='$email' AND password='$hashed_password'";
	        $result = mysqli_query($conn, $sql);

	        // Check if query returned a row
	        if (mysqli_num_rows($result) == 1) {
	            // User has successfully logged in
	            echo "<p>Login successful!</p>";
	        } else {
	            // Invalid email or password
	            echo "<p>Invalid email or password.</p>";
	        }
	    } else {
	        // Email or password is empty
	        echo "<p>Email or password is empty.</p>";
	    }

	    // Close database connection
	    mysqli_close($conn);
	}
	?>
    