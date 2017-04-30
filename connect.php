<?php 
$DB = new mysqli('ucdencsesql05.ucdenver.pvt', 'student**', '******', 'student***');

	if ($DB->connect_error) {
		die('Connect Error (' . $Db->connect_errno . ') '. $DB->connect_error);
			}
 ?>