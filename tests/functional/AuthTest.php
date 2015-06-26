<?php 

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory;

class AuthTest extends TestCase
{
	use DatabaseTransactions, RegistersUsers;

	/** @test */
	public function it_registers_a_user()
	{
		$credentials = ['email' => 'foo@example.com'];

		$this->register( $credentials )
			 ->verifyInDatabase('users', $credentials)
			 ->andSeepageIs('/notices/create');
	}

	/** @test */
	public function it_notifies_a_user_of_registration_errors()
	{
		$this->createUser( $overrides = ['email' => 'foo@example.com'] );

		$this->register( $overrides )
			->andSee('The email has already been taken.')
			->andSeePageIs('auth/register');
	}

	protected function createUser( array $overrides = [] )
	{
		return Factory::create( 'App\User', $overrides );
	}




}