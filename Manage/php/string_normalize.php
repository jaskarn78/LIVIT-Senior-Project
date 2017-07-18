<?php
	function convertString($oldStr) {
		$oldStr = str_replace('"', '%q', $oldStr);
		$oldStr = str_replace("'", '%s', $oldStr);
		$oldStr = preg_replace( "/\r|\n/", "", $oldStr );
		
		return $oldStr;
	}
	
	function revertString($oldStr) {
		$oldStr = str_replace('%q', '"', $oldStr);
		$oldStr = str_replace('%s', "'", $oldStr);
		
		return $oldStr;
	}
?>