<?php
	require_once 'global.php';
	session_destroy();
	header("LOCATION: ". PATH ."/index?bye");

?>
