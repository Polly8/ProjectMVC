<?php

class Main_model extends Model {

	function __construct() {
		parent::__construct();
		$this->db = new Model;
	}


	function sendMessage($message, $user_id){


		if ($message){

			$result = $this->db->prepare("INSERT INTO messages (`text`, `id_user`) VALUES (:message, :user_id);");
			$result->execute([':message'=> $message, ':user_id' => $user_id]);


			$postId = $this->db->lastInsertId();
			if (!empty($_FILES['userfile']['tmp_name'])) {
				$fileContent = file_get_contents($_FILES['userfile']['tmp_name']);
				file_put_contents('../../images/'. $postId . '.png', $fileContent);
			}

			if ($result){

				echo 'Сообщение отправлено!';
			}

		}else {

			echo 'Сообщение не должно быть пустым';
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

				$resultUsers = $this->db->prepare("SELECT * FROM users WHERE `id` = :userIdByMes");
				$resultUsers->execute([':userIdByMes'=> $userIdByMes]);

				$users = $resultUsers->fetch(PDO::FETCH_ASSOC);

				$value['name'] = $users['name'];

			}

			$resultArray[] = $value;
		}

		$this->selectForJson();

		return $resultArray;

	}

	function selectForJson(){

		$query = "SELECT * FROM messages ORDER BY id DESC";
		$result = $this->db->query($query);
		$messages = $result->fetchAll(PDO::FETCH_ASSOC);

		$result = [];

		foreach($messages as $value){

			for ($i = 1; $i < sizeof($value); $i++){

				$userIdByMes = $value['id_user'];

				$resultUsers = $this->db->prepare("SELECT * FROM users WHERE `id` = :userIdByMes");
				$resultUsers->execute([':userIdByMes'=> $userIdByMes]);

				$users = $resultUsers->fetch(PDO::FETCH_ASSOC);

				$value['name'] = $users['name'];

			}

			$result[] = $value;
		}



		$newFile = 'messages.json';

		$fp = fopen($newFile, 'w');

		$toJson = json_encode($result, JSON_PRETTY_PRINT);

		fputs($fp, $toJson);

		fclose($fp);

	}



}