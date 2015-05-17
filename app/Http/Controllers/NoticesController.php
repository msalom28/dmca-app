<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NoticesController extends Controller 
{	
	/**
	 * Create a new notices controller instance
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display all notices
	 */
	public function index()
	{
		return 'all notices';
	}


	/**
	 * Display form to create a new notice
	 */
	public function create()
	{
		return view('notices.create');

	}
}
