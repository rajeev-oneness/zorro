<?php
define('DB_USERNAME', 'demo9dtx_mentor');
define('DB_PASSWORD', 'mentorly');
define('DB_HOST', 'localhost');
define('DB_NAME', 'demo9dtx_zorro');

function connect(){
	$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

	return $con;
}
?>