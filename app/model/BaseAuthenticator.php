<?php


namespace App;

use Chap\Doctrine\UserFacade;
use Nette\Http\Session;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;
use Nette\Security\Passwords;
use Nette\Security\AuthenticationException;
use Nette\Utils\DateTime;

/**
 * Description of BaseAuthenticator
 *
 * @author chap
 */
class BaseAuthenticator implements IAuthenticator{

    /**
     * @var UserFacade
     */
    private $uf;
    
    public function __construct(UserFacade $uf, Session $sess) {
        $this->uf = $uf;
    }

    /**
     * Performs an authentication.
     * @param array $credentials
     * @return Identity
     * @throws AuthenticationException
     */
    public function authenticate(array $credentials) {
        list($username, $password) = $credentials;

        $user = $this->uf->findByEmail($username);
        
        if (!$user) {
            throw new  AuthenticationException('Neznámý uživatel.', self::IDENTITY_NOT_FOUND);
        } elseif (!Passwords::verify($password, $user->password)) {
            throw new  AuthenticationException('Chybné heslo.', self::INVALID_CREDENTIAL);
        }
        $user->last_seen = new DateTime();
        $this->uf->persistAndFlush($user);

        $r = array("email" => $user->email, "username" => $user->login_name);
        return new Identity($user->id, $user->role, $r);
    }
}
