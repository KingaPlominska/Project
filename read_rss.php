<?php
	try
	{
		$connect = new PDO("mysql:dbname=formularz;host=127.0.0.1", "admin", "admin"); 
		
		$results = $connect->query("SELECT rss AS rss FROM lista_rss WHERE email='".$_GET['email']."'")->fetchAll(PDO::FETCH_COLUMN);
				
		echo json_encode($results);		
		
	} catch(Exception $e) {
		//echo "Exception occured: " . $e->getMessage(); 
	}
?>




