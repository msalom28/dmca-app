<?php 

use Laracasts\TestDummy\Factory;

trait RegistersUsers
{
	protected function register( array $overrides )
	{
		$fields = $this->registerFields( $overrides );

		return $this->visit('auth/register')
			->andSubmitForm('Register', $fields);
	}


	protected function registerFields( $overrides )
	{
		$user = Factory::attributesFor( 'App\User', $overrides );

		return $user+= ['password_confirmation' => $user['password']];
	}

}