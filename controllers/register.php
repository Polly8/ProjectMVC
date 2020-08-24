<?php

class Register extends Controller{

	public $email;
	public $originalPassword;
	public $repeatedPassword;
	public $name;
	public $hashPassword;

	function __construct() {

		parent::__construct();

		$this->name = htmlspecialchars($_POST['name']);

		$this->email = trim(htmlspecialchars($_POST['login']), ' ');

		$this->originalPassword = trim(htmlspecialchars($_POST['password']));

		$this->repeatedPassword = trim(htmlspecialchars($_POST['repeat-password']));

		$this->hashPassword = sha1($this->originalPassword . 'bfhegu4355,frg');



	}

	public function index() {

		$email = $this->email;
		$name = trim($this->name, ' ');
		$hashPassword = $this->hashPassword;
		$passwordOrigin = $this->originalPassword;
		$passwordRepeated = $this->repeatedPassword;

		$this->model = new Register_model();

		if (strpos($name, ' ') === 0){

			echo 'name should not be empty';
			die;
		}

		if (!(strlen($passwordOrigin) >= 4)){

			echo 'Пароль должен быть не менее 4-х символов';
			die;
		}

		if ($passwordOrigin != $passwordRepeated){

			echo 'Пароли должны совпадать';
			die;
		}

		$this->model->registration($name, $email, $hashPassword);


	}
}