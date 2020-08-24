<?php

session_start();

$url = $_GET['url'];
$url = explode('/', $url);




if (empty($url[0])) {

	if(!isset($_SESSION['user_id'])){

		require 'Controllers/registration.php';
		$controller = new Registration;
		$controller->loadModel('registration');


	}else{

		require 'Controllers/main.php';
		$controller = new Main;
		$controller->loadModel('main');
	}


}else{

	$path = 'controllers/' . $url[0] . '.php';


	if (!isset($_SESSION['user_id']) && $url[0] != 'register' && $url[0] != 'auth' && $url[0] != 'message') {

		require 'Controllers/registration.php';
		$controller = new Registration;
		$controller->loadModel('registration');

		echo 'Вы должны войти или зарегистрироваться!' . '<br>';

	}else{

		if (file_exists($path)) {

			require $path;
			$controller = new $url[0];
			$controller->loadModel($url[0]);

		}else{

			require 'Controllers/main.php';
			$controller = new Main;
			$controller->loadModel('main');
			//$controller->index();
		}

	}

}



if (!empty($url[2])) {


	if (method_exists($controller, $url[1])) {

		$controller->{$url[1]}($url[2]);

	}else{

		$controller->index();
	}

}else {


	if (!empty($url[1])) {


		if (method_exists($controller, $url[1])) {

			$controller->{$url[1]}();

		}else {

			$controller->index();
		}

	}else {

		$controller->index();
	}
}





