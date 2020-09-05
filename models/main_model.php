<?php

class Main_model extends Model {

	function __construct() {
		parent::__construct();
		$this->db = new Model;
	}


	function sendMessage($message, $user_id){


		if ($message){

//			$result = $this->db->prepare("INSERT INTO messages (`text`, `id_user`) VALUES (:message, :user_id);");
//			$result->execute([':message'=> $message, ':user_id' => $user_id]);



			$messageData = [
				'text' => $message,
				'id_user' => $user_id
			];


			$newMessage = Message::create($messageData);


			$postId = $newMessage['id'];

			if (!empty($_FILES['userfile']['tmp_name'])) {
				$fileContent = file_get_contents($_FILES['userfile']['tmp_name']);
				file_put_contents('../../images/'. $postId . '.png', $fileContent);
			}

			if ($newMessage){

				echo 'Сообщение отправлено!';
			}

		}else {

			echo 'Сообщение не должно быть пустым';
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

		$this->selectForJson();

		return $resultArray;

	}



	function selectForJson(){

		$resultData= Message::orderBy('id', 'desc')->get();

		$result = [];

		foreach($resultData as $key => $value){

			for ($i = 1; $i < sizeof($resultData); $i++){

				$userIdByMes = $value['id_user'];


				$resultUsers= User::query()->where('id', '=', $userIdByMes)->get();

				foreach($resultUsers as $keyU => $valueU){

					$value['name'] = $valueU['name'];

				}

			}

			$result[] = $value;

		}



		$newFile = 'messages.json';

		$fp = fopen($newFile, 'w');

		$toJson = json_encode($result, JSON_PRETTY_PRINT);

		fputs($fp, $toJson);

		fclose($fp);

	}



	function selectUsers(){

		$usersResult = User::all();

		$usersArray = [];

		foreach($usersResult as $key => $value){

			$usersArray[] = $value;
		}


		return $usersArray;

	}

	function createUser($name, $email, $password){


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