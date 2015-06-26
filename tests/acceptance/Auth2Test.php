<?php 

use Laracasts\Integrated\Extensions\Selenium;
use Laracasts\Integrated\Services\Laravel\Application as Laravel;

class Auth2Test extends Selenium
{
	use Laravel, RegistersUsers;

	/** @test */
	function it_visits_the_registration_page()
	{
		// $credentials = ['email' => 'foo@example.com'];

		// $this->register( $credentials )->wait( 5000 );

		$this->visit('auth/register')->wait( 5000 );
	}
}