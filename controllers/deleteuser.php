<?php

class Deleteuser extends Controller{

	public $usersDatas;
	public $email;


	function __construct() {

		parent::__construct();

		$this->email = $_POST['delemail'];

	}

	public function index() {

		$email = $_POST['delemail'];

		$this->model = new Deleteuser_model();

		$this->usersDatas = $this->model->deleteUser($email);


		$this->datas = $this->model->selectMessages();


		$this->view->renderTwig('main/index', ['datas' => $this->datas, 'users' => $this->usersDatas, 'session' => $_SESSION['user_id']]);


	}



}