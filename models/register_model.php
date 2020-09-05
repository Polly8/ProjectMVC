<?php

class Register_model extends Model {


	function __construct() {
		parent::__construct();
		//$this->db = new Model;
	}


	function registration($name, $email, $password){


		$usersData= User::query()->where('email', '=', $email)->get();


		$users = $usersData->toArray();


		if ($users[0]){

			//echo 'Пользователь с таким e-mail уже есть';

			return false;

		}else{


			$usersData = [
				'name' => $name,
				'email' => $email,
				'password' => $password
			];


			$newUser = User::create($usersData);



			if ($newUser){

				echo "Пользователь $name создан!";


			}else{

				echo 'Error';
			}

		}

	}


}