<?php

class Deletemessage extends Controller{



	function __construct() {

		parent::__construct();

	}

	public function index() {

		$message = $_POST['message-id'];

		$this->model = new Deletemessage_model();

		$datas = $this->model->deleteMessage($message);



		$this->view->renderTwig('main/index', ['datas' => $datas, 'session' => $_SESSION['user_id']]);


	}



}