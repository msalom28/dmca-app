<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {

	/**
	 * Fillable fields for a new notice 
	 *
	 * @var array
	 */
	protected $fillable = [

		'infringing_title',
		'infringing_link',
		'original_link',
		'original_description',
		'template',
		'content_removed',
		'provider_id'

	];

	/**
	 * Named constructor
	 * Create a new instance of Notice
	 * @return static
	 */
	public static function open(array $attributes)
	{
		return new static($attributes);
	}

	/**
	 * Set the email template for the notice
	 */
	public function useTemplate($template)
	{
		$this->template = $template;

		return $this;
	}

	/**
	 * When you define  custom name in your relationship you need
	 * to also show the name of the field this relationship  is 'provider_id'
	 */


	/**
	 * A notice belongs to a provider
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function recipient()
	{
		return $this->belongsTo('App\Provider', 'provider_id');
	}

	/**
	 * A Notice is created by a user
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}


	/**
	 * Get the email for the recipient of the dmca
	 *
	 * @return string
	 */
	public function getRecipientEmail()
	{
		return $this->recipient->copyright_email;
	}

	/**
	 * Get the email address of the user who created the notice
	 *
	 * @return string
	 */
	public function getOwnerEmail()
	{
		return $this->user->email;
	}

}
