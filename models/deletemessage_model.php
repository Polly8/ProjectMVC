<?php

class Deletemessage_model extends Model {



	function __construct() {

		parent::__construct();
		$this->db = new Model;
	}


	function deleteMessage($message){



		$result = $this->db->prepare("DELETE FROM messages WHERE `id` = :message");
		$result->execute([':message'=> $message]);

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

		return $resultArray;

	}


}