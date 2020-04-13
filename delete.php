<?php

if(isset($_GET['number'])) {
	$number = $_GET['number'];
	if(file_exists('numbers/'.$number.'.xml')) {
		$result = unlink('numbers/'.$number.'.xml');
		if($result) {
			header("Location: all_numbers.php?res=1");
			die;
		} else {
			header("Location: all_numbers.php?res=0");
			die;	
		}
	}
}