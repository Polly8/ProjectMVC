<?php


use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
	'driver'    => 'mysql',
	'host'      => '127.0.0.1',
	'database'  => 'mvc_project',
	'username'  => 'root',
	'password'  => '',
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$capsule->getConnection()->enableQueryLog();

//echo '<pre>';
//
//var_dump($capsule->getConnection()->query()->select()->from('users')->get());
//var_dump($capsule->getConnection()->getQueryLog());
//die;


class User extends \Illuminate\Database\Eloquent\Model
{
	public $table = 'users';
	public $primaryKey = 'id';
	//public $connection = CONNECTION_DEFAULT;


	public $fillable = ['id', 'name', 'email', 'password', 'created_at', 'updated_at'];


	public function messages(){

		return $this->hasMany(Message::class, 'id_user', 'id');
	}
}


class Message extends \Illuminate\Database\Eloquent\Model
{
	public $table = 'messages';
	public $primaryKey = 'id';


	public $fillable = ['id', 'text', 'id_user', 'created_at', 'updated_at'];


	public function userData() {

		return $this->belongsTo(User::class , 'id_user', 'id');
	}
}