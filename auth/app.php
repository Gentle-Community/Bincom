<?php
 session_start();

function redirect($message, $page, $alert)
	{
		$_SESSION['alert'] = $alert;
		$_SESSION['message'] = $message;
		header("Location: $page");
		exit(0);
	}

?>