<?php 	
	try
	{
		if(!strpos("$_POST[email]", "@"))
		{
			throw new Exception("Wrong email");
		}
		if(!strpos("$_POST[rss]", "://"))
		{
			throw new Exception("Wrong link");
		}
				
		//echo "$_POST[rss]" ;
		
		$connect = new PDO("mysql:dbname=formularz;host=127.0.0.1", "admin", "admin"); 
				
		$status = $connect->exec("UPDATE lista_rss SET rss=CONCAT(rss, ':s:$_POST[rss]') WHERE email='$_POST[email]'");
		if (!$status)
		{
			$connect->exec("INSERT INTO lista_rss (email, rss) VALUES ('$_POST[email]', '$_POST[rss]')");
		}
				
		echo "RSS added to database.";
		
	} catch(Exception $e) {
		echo "Exception occured: ", $e->getMessage(), "";
	}
?>




