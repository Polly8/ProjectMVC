<?php

class Main extends Controller{

	public $message;
	public  $datas;

	function  __construct() {

		parent::__construct();

		$this->message = htmlspecialchars($_POST['message']);

	}


	public function index(){

		$message = $this->message;
		$user_id = $_SESSION['user_id'];

		$user_idresult = str_replace('admin', '', $user_id);

		$this->model = new Main_model();


		$this->model->sendMessage($message, $user_idresult);

		$this->datas = $this->model->selectMessages();

		$this->view->render('main/index', $this->datas);

	}


}
