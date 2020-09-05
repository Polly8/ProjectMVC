<?php

class Changeuser extends Controller{

	public $newName;
	public $newEmail;
	public $newOriginalPassword;
	public $newHashPassword;
	public $userId;
	public $datas;
	public $usersDatas;


	function __construct() {

		parent::__construct();

		$this->newName = $_POST['username'];
		$this->newEmail = $_POST['userlogin'];
		$this->newOriginalPassword = $_POST['userpassword'];
		$this->userId = $_POST['userid'];
		$this->newHashPassword = sha1($this->newOriginalPassword . 'bfhegu4355,frg');

	}

	public function index() {


		$newName = $this->newName;
		$newEmail = $this->newEmail;
		$newPassword = $this->newHashPassword;
		$userId = $this->userId;


		$this->model = new Changeuser_model();

		$this->usersDatas = $this->model->changeUser($newName, $newEmail, $newPassword, $userId);



		$this->datas = $this->model->selectMessages();


		$this->view->renderTwig('main/index', ['datas' => $this->datas, 'users' => $this->usersDatas, 'session' => $_SESSION['user_id']]);


	}



}