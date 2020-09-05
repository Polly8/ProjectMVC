<?php

class Deletemessage_model extends Model {



	function __construct() {

		parent::__construct();
		//$this->db = new Model;
	}


	function deleteMessage($message){


		$delMessage= Message::query()->where('id', '=', $message)->delete();



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