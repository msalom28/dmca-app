<?php 

$factory('App\User', [
	'name'     => $faker->firstName,
	'email'    => $faker->email,
	'password' => bcrypt('password')

]);