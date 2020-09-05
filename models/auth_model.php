<?php

class Auth_model extends Model {



	function __construct() {
		parent::__construct();
//		$this->db = new Model;
	}


	function authorization($email, $password){


		$usersData= User::query()->where('email', '=', $email)->get();


		$users = $usersData->toArray();


		if (!$users){

			echo 'Пользователь с таким e-mail и паролем не найден! 123';

		}else{

			foreach($users as $key => $user) {

				if($password !== $user['password']) {

					echo "Пользователь с таким e-mail и паролем не найден! 456";
				}
				else {

					if($user['name'] == 'admin') {

						$_SESSION['user_id'] = $user['id'].'admin';
					}
					else {

						$_SESSION['user_id'] = $user['id'];

						echo $user['name'];
					}
				}
			}
		}


	}

	function selectMessages(){

		$messagesData= Message::orderBy('id', 'desc')->take(20)->get();


		$resultArray = [];

		foreach($messagesData as $key => $value){

			for ($i = 1; $i < sizeof($messagesData); $i++){

				$userIdByMes = $value['id_user'];


				$resultUsers= User::query()->where('id', '=', $userIdByMes)->get();



				foreach($resultUsers as $keyU => $valueU){

					$value['name'] = $valueU['name'];

				}

			}

			$resultArray[] = $value;


		}

		return $resultArray;

	}


	function selectUsers(){

		$usersResult = User::all();

		$usersArray = [];

		foreach($usersResult as $key => $value){

			$usersArray[] = $value;
		}


		return $usersArray;

	}
}