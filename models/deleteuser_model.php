<?php

class Deleteuser_model extends Model {



	function __construct() {

		parent::__construct();
		//$this->db = new Model;
	}


	function deleteUser($email){

		$delUser= User::query()->where('email', '=', $email)->delete();

		$usersResult = User::all();

		$usersArray = [];

		foreach($usersResult as $key => $value){

			$usersArray[] = $value;
		}

		return $usersArray;

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



}