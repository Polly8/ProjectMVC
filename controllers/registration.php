<?php


class Registration extends Controller{


	function __construct() {

		parent::__construct();

	}

	function index(){

		$this->view->renderTwig('registration/index');
	}

}