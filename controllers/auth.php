<?php

class Auth extends Controller{

	public $email;
	public $originalPassword;
	public $hashPassword;
	public $name;


	function __construct() {

		parent::__construct();

		$this->email = htmlspecialchars($_POST['login']);
		$this->originalPassword = htmlspecialchars($_POST['password']);
		$this->hashPassword = sha1($this->originalPassword . 'bfhegu4355,frg');
	}

	public function index() {

		$email = $this->email;
		$hashPassword = $this->hashPassword;


		$this->model = new Auth_model();

		$this->model->authorization($email, $hashPassword);



		if(isset($_SESSION['user_id'])){

			$datas = $this->model->selectMessages();

			$this->view->render('main/index', $datas);

		}

	}



}