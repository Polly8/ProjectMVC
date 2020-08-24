<?php

class Controller {


	function __construct() {

		$this->view = new View;
		$this->model = new Model;

	}


	public function loadModel($name) {

		$path = 'models/' . $name . '_model.php';
		$modelName = $name . '_model';


		if (file_exists($path)){

			require $path;

			$this->model = new $modelName;
		}

	}

}