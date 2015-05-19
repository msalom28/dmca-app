<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrepareNoticeRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Provider;
use App\Notice;
use Mail;

class NoticesController extends Controller 
{	
	/**
	 * Create a new notices controller instance
	 */
	public function __construct()
	{
		$this->middleware('auth');

		parent::__construct();
	}

	/**
	 * Display all notices
	 */
	public function index()
	{
		return $this->user->notices;
	}


	/**
	 * Display form to create a new notice
	 */
	public function create()
	{
		$providers = Provider::lists('name', 'id');

		return view('notices.create', compact('providers'));

	}

	/**
	 * Confirm that the dmca notice has been properly generated
	 */
	public function confirm(PrepareNoticeRequest $request)
	{
		$template = $this->compileDmcaTemplate($data = $request->all());

		session()->flash('dmca', $data);

		return view('notices.confirm', compact('template'));
	}

	/**
	 * Persist a new dmca notice
	 */
	public function store(Request $request)
	{
		$data = session()->get('dmca');		

		$notice = Notice::open($data)->useTemplate($request->input('template'));

		$notice = $this->user->notices()->save($notice);

		//We are using the mail library because we will be sending one email
		//only
		Mail::queue('emails.dmca', compact('notice'), function($message) use ($notice) {

			$message->from($notice->getOwnerEmail())
					->to($notice->getRecipientEmail())
					->subject('DMCA Notice');
		});

		/**
		 * You use Mail::raw to send a custom email
		 * You can also use Mail::raw('welcom aboard', function(){} ....)
		 */

		return redirect('notices');

		//or you can create your new notice like this:
		//$auth->user()->notices()->create(array);


		/**
		 * Another way of accomplishing this will be like this:
		 */

		// $notice = session()->get('dmca') + ['template' => $request->input['template']];

		// Auth::user()->notice()->create($notice);
	}

	/**
	 * Compile DMCA letter
	 */
	public function compileDmcaTemplate($data)
	{
		$data = $data + [
			'name' => $this->user->name,
			'email'=> $this->user->email
		];

		return view()->file(app_path('Http/Templates/dmca.blade.php'), $data);
	}
}
