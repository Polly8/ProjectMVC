<?php

define('URL', 'http://phpmvc/');




function getDbConnection(): PDO
{

	static $DB;

	if(!$DB){

		try {

			$DB = new PDO("mysql:host=127.0.0.1;dbname=mvc_project", 'root', '');

		}catch (PDOException $e) {

			echo $e->getMessage();
			die;
		}
	}

	return $DB;
}

