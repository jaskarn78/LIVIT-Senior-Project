<?php
	function distanceGeoPoints($lat1, $lng1, $lat2, $lng2){
		$earthRadius = 3958.75;
		$dLat = deg2rad($lat2-$lat1);
		$dLng = deg2rad($lng2-$lng1);
		
		$a=sin($dLat/2)*sin($dLat/2)+
			cos(deg2rad($lat1))*cos(deg2rad($lat2))*
			sin($dLng/2)*sin($dLng/2);
		$c = 2*atan2(sqrt($a), sqrt(1-$a));
		$dist = $earthRadius * $c;

		return $dist;
	}
	echo round(distanceGeoPoints($argv[1], $argv[2], $argv[3], $argv[4]), PHP_ROUND_HALF_UP);
?>
