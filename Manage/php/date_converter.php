<?php
	function convertDate($origDate) {
		$month 		= substr($origDate, 0, 2);
		$day 		= substr($origDate, 3, 2);
		$year		= substr($origDate, 6, 4);
		
		return $year . '-' . $month . '-' . $day;
	}
?>