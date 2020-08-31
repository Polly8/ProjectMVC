<?php

class Auth extends Controller{

	public $email;
	public $originalPassword;
	public $hashPassword;
	public $name;


	function __construct() {

		parent::__construct();

		$email = $_POST['login'];
		$originalPassword = $_POST['password'];

		$this->email = htmlspecialchars($email);
		$this->originalPassword = htmlspecialchars($originalPassword);
		$this->hashPassword = sha1($this->originalPassword . 'bfhegu4355,frg');
	}

	public function index() {

		$email = $this->email;
		$hashPassword = $this->hashPassword;


		$this->model = new Auth_model();

		$this->model->authorization($email, $hashPassword);



		if(isset($_SESSION['user_id'])){

			$datas = $this->model->selectMessages();



			$this->view->renderTwig('main/index', ['datas' => $datas, 'session' => $_SESSION['user_id']]);

		}

	}



}