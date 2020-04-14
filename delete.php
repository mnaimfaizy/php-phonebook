<?php

if(isset($_POST['number'])) {
	$number = $_POST['number'];
	if(file_exists('numbers/'.$number.'.xml')) {
		$result = unlink('numbers/'.$number.'.xml');
		echo ($result) ? "1" : "0";	
	}
}