<?php

use Nette\Security,
	Nette\Utils\Strings;

/**
 * Admin users authenticator.
 */
class AdminAuthenticator extends Nette\Object implements Security\IAuthenticator
{
	/** @var Nette\Database\Connection */
	private $database;


	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
	}


	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($email, $password) = $credentials;
		$row = $this->database->table('adminuser')->where('email', $email)->fetch();

		if (!$row) {
			throw new Security\AuthenticationException('The email is incorrect.', self::IDENTITY_NOT_FOUND);
		}

		if ($row->password !== $this->calculateHash($password, $row->password)) {
			throw new Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
		}

		$arr = $row->toArray();
		unset($arr['password']);
		return new Nette\Security\Identity($row->id, $row->role, $arr);
	}


	/**
	 * Computes salted password hash.
	 * @param  string
	 * @return string
	 */
	public static function calculateHash($password, $salt = NULL)
	{
		return crypt($password, $salt ?: '$2y$07$' . Strings::random(22));
	}

}
