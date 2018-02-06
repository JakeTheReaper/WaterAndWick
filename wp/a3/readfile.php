<?php
		$fp = fopen("products.csv", "r");
		flock($fp, LOCK_SH);
		$headings = fgetcsv($fp);
		while($records[] = fgetcsv($fp)) {}			
		flock($fp, LOCK_UN);
		fclose($fp);

		$productTree = array();
		$productTree[$pID] = $records[0][0];
		$productTree[$pTitle] = $records[0][1];
		$pDesc = $records[0][2];
		$option = $records[0][3];
		$price = $records[0][4];
		
		echo $productTree[$pID];						
		echo $pDesc;

?>

