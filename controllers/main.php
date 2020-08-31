<?php

class Main extends Controller{

	public $message;
	public  $datas;

	function  __construct() {

		parent::__construct();

		$message = $_POST['message'];

		$this->message = htmlspecialchars($message);

	}


	public function index(){

		$message = $this->message;
		$user_id = $_SESSION['user_id'];

		$user_idresult = str_replace('admin', '', $user_id);

		$this->model = new Main_model();


		$this->model->sendMessage($message, $user_idresult);

		$this->datas = $this->model->selectMessages();


		$this->view->renderTwig('main/index', ['datas' => $this->datas, 'session' => $_SESSION['user_id']]);

	}


}

