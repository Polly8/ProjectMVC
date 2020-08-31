<?php


class Test extends Controller{


	function __construct() {

		parent::__construct();

	}

	function index(){

		$this->view->renderTwig('test',  ['key' => '123455677', 'name' => 'Peter']);
	}

}