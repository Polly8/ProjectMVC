<?php

class Main extends Controller{

	public $name;
	public $email;
	public $originalPassword;
	public $hashPassword;


	public $message;
	public  $datas;
	public $usersDatas;



	function  __construct() {

		parent::__construct();

		$message = $_POST['message'];

		$this->message = htmlspecialchars($message);



		$name = $_POST['name'];
		$email = $_POST['login'];
		$originalPassword = $_POST['password'];

		$this->name = htmlspecialchars($name);

		$this->email = trim(htmlspecialchars($email), ' ');

		$this->originalPassword = trim(htmlspecialchars($originalPassword), ' ');

		$this->hashPassword = sha1($this->originalPassword . 'bfhegu4355,frg');



	}


	public function index(){

		$email = $this->email;
		$name = trim($this->name, ' ');
		$hashPassword = $this->hashPassword;
		$passwordOrigin = $this->originalPassword;


		$message = $this->message;
		$user_id = $_SESSION['user_id'];

		$user_idresult = str_replace('admin', '', $user_id);

		$this->model = new Main_model();


		$this->model->sendMessage($message, $user_idresult);

		$this->datas = $this->model->selectMessages();


		if (strpos($name, ' ') === 0){

			echo 'name should not be empty';


		}else{

			if (!(strlen($passwordOrigin) >= 4)){

				echo 'Пароль должен быть не менее 4-х символов';

			}else{

				$this->model->createUser($name, $email, $hashPassword);
			}

		}


		$this->usersDatas = $this->model->selectUsers();


		$this->view->renderTwig('main/index', ['datas' => $this->datas, 'users' => $this->usersDatas, 'session' => $_SESSION['user_id']]);




	}



}

