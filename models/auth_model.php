<?php

class Auth_model extends Model {



	function __construct() {
		parent::__construct();
	}


	function authorization($email, $password){


		$result = $this->db->prepare("SELECT * FROM users WHERE `email` = :email LIMIT 1");
		$result->execute([':email'=> $email]);
		$users = $result->fetch(PDO::FETCH_ASSOC);



		if (!$users['email']){

			echo 'Пользователь с таким e-mail и паролем не найден! 123';

		}else{

			if($password !== $users['password']){

				echo "Пользователь с таким e-mail и паролем не найден! 456";


			}else{

				if ($users['name'] == 'admin'){

					$_SESSION['user_id'] = $users['id'] . 'admin';

				}else{

					$_SESSION['user_id'] = $users['id'];

					echo $users['name'];
				}


			}
		}
	}

	function selectMessages(){

		$query = "SELECT * FROM messages ORDER BY id DESC LIMIT 20";
		$result = $this->db->query($query);
		$messages = $result->fetchAll(PDO::FETCH_ASSOC);

		$resultArray = [];

		foreach($messages as $value){

			for ($i = 1; $i < sizeof($value); $i++){

				$userIdByMes = $value['id_user'];

				$resultUsers = $this->db->prepare("SELECT * FROM users WHERE `id` = :id");
				$resultUsers->execute([':id'=> $userIdByMes]);
				$users = $resultUsers->fetch(PDO::FETCH_ASSOC);

				$value['name'] = $users['name'];

//				if ($users['name'] == 'admin'){
//
//					$_SESSION['user_id'] = $users['id'] . 'admin';
//				}
			}

			$resultArray[] = $value;
		}

		return $resultArray;

	}
}