<?php

class Register_model extends Model {


	function __construct() {
		parent::__construct();
	}


	function registration($name, $email, $password){


		$result = $this->db->prepare("SELECT * FROM users WHERE `email` = :email LIMIT 1");
		$result->execute([':email'=> $email]);
		$users = $result->fetchAll();

		if ($users[0]){

			echo 'Пользователь с таким e-mail уже есть';

		}else{

			$query = $this->db->prepare("INSERT INTO users (`name`, `email`, `password`) 
VALUES ( :name, :email, :password);");
			$query->execute([':name'=> $name, ':email'=> $email, ':password' => $password]);


			if ($query){

				echo "Пользователь $name создан!";

			}else{

				echo 'Error';
			}

		}

	}


}