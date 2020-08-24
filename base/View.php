<?php

class View {

	public function render($name, $datas = false){

		require 'views/header.php';
		require 'views/' . $name . '.php';
		require 'views/footer.php';
	}
}