<?php

class Model extends PDO {

	function __construct() {

		parent::__construct('mysql:host=127.0.0.1;dbname=mvc_project', 'root', '');
		//$this->db = new Database;

	}



}

