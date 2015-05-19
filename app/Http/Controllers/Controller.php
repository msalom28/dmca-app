<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	/**
	 * The authenticated user
	 * 
	 * @var App\User | null
	 */
	protected $user;

	/**
	 * Is the user signed in 
	 *
	 * @var App\User | null
	 */
	protected $signedIn;

	/**
	 * Create a new Controller instance
	 */
	public function __construct()
	{
		$this->user = $this->signedIn = Auth::user();

		//to retrieve the current user's username
		//$this->user->username;
		//To verify if the user is logged in
		//if($this->signedIn){}...
	}

}
