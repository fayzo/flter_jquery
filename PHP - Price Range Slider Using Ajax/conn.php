<?php
	$conn = new mysqli("localhost", "root", "", "social_menya");
	
	if(!$conn){
		die("Error: Can't connect to database!");
	}
?>