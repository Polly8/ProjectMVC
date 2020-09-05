<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;




Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function(Blueprint $table) {

	$table->increments('id');
	$table->string('name');
	$table->string('email');
	$table->string('password');
	$table->timestamps();


});



Capsule::schema()->dropIfExists('messages');

Capsule::schema()->create('messages', function(Blueprint $table) {

	$table->increments('id');
	$table->text('text');
	$table->integer('id_user');
	$table->timestamps();

});