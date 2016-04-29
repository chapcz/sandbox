<?php
/**
 * Created by PhpStorm.
 * User: chap
 * Date: 20.4.2016
 * Time: 8:59
 */

namespace chap;


use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;
use Nette\Security\IIdentity;

class Prihlasovac implements IAuthenticator
{

	/**
	 * Performs an authentication against e.g. database.
	 * and returns IIdentity on success or throws AuthenticationException
	 * @return IIdentity
	 * @throws AuthenticationException
	 */
	function authenticate(array $credentials)
	{
		return new Identity(1, ["admin"], ["name"=> $credentials[0]]);
	}
}