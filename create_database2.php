<?php

	//MySQL credentials
	$host = "127.0.0.1";
	$user = "root";
	$pass = "";
	$database = "apitest";
	$table = "users";

	//connect to mysql
	mysql_connect($host, $user, $pass);


	//create a new database
	$query = sprintf("CREATE DATABASE IF NOT EXISTS %s", $database);
		$result = fancy_query($query);

		mysql_selectdb($database);

	$query = sprintf("CREATE TABLE IF NOT EXISTS %s (".
						"user_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, ".
						"username VARCHAR(25) NOT NULL, ".
						"password VARCHAR(25) NOT NULL, ".
						"INDEX (username))"
						, $table);

		$result = fancy_query($query);

		if($result)
		{
			echo "<h1>Table created!</h1>";
		}

	function fancy_query($__query)

	{	$internal_result = mysql_query($__query);

		if(!$internal_result)
		{
			die("MySql Query Failed: ".mysql_error());
		}

	}