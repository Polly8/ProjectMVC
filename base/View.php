<?php

class View {

	public $twig;


	public function render($name, $datas = false){

		require 'views/header.php';
		require 'views/' . $name . '.php';
		require 'views/footer.php';
	}


	public  function renderTwig($name, $datas = []){



		$templateDir = realpath(__DIR__ . '/../views');


		$loader = new \Twig\Loader\FilesystemLoader($templateDir);

		$this->twig = new \Twig\Environment($loader);


		require 'views/header.twig';
		echo $this->twig->render($name . '.twig', $datas);
		require 'views/footer.twig';

	}
}



