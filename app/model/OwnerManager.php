<?php
namespace App\Model;
use Nette;
use Nette\Security\Passwords;


/**
 * Owner management.
 */
class OwnerManager extends Nette\Object implements Nette\Security\IAuthenticator {
	
	const
		TABLE_NAME = '_owner', // user
		COLUMN_FIRSTNAME = 'firstname',
		COLUMN_ID = 'id',
		COLUMN_EMAIL = 'email',
		COLUMN_PASSWORD_HASH = 'pass', //password
		COLUMN_DT_REGISTRATION = 'dt_registration',
		COLUMN_ROLE = 'idrole'; // role

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
		//$this->add('petr.syrny@centrum.cz','Krutor11');
	}

	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials) {
		list($email, $password) = $credentials;

		$row = $this->database->table(self::TABLE_NAME)->where(self::COLUMN_EMAIL, $email)->fetch();
    
		\Tracy\Debugger::barDump(array('email'=>$email,'pass'=>$password), 'Login form input');
    
		if (!$row) {
			throw new Nette\Security\AuthenticationException('Přihlášení se nezdařilo, zkontrolujte zadané údaje.', self::IDENTITY_NOT_FOUND);
		} elseif (!Passwords::verify($password, $row[self::COLUMN_PASSWORD_HASH])) {
			throw new Nette\Security\AuthenticationException('Špatné přihlašovací údaje', self::INVALID_CREDENTIAL);
		} elseif (Passwords::needsRehash($row[self::COLUMN_PASSWORD_HASH])) {
			$row->update(array(
				self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
			));
		}

		$arr = $row->toArray();
		unset($arr[self::COLUMN_PASSWORD_HASH]);
		return new Nette\Security\Identity($row[self::COLUMN_ID], $row[self::COLUMN_ROLE], $arr);
	}


	/**
	 * Prida noveho ownera
	 * @param  string $firstname - jmeno
	 * @param  string $email - email
	 * @param  string $password - heslo
	 * @return void
	 */
	public function addOwner($firstname, $email, $password) {
		try {
			$this->database->table(self::TABLE_NAME)->insert(array(
				self::COLUMN_FIRSTNAME => $firstname,
				self::COLUMN_EMAIL => $email,
				self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
				self::COLUMN_DT_REGISTRATION => date('Y-m-d H:i:s'),
				'accountno' => date('ymdHis') 
			));
		} catch (Nette\Database\UniqueConstraintViolationException $e) {
			throw new DuplicateNameException;
		}
	}
	
	/**
	 * Updatuje ownera
	 */
	public function updateOwner($idowner) {
		if (!$idowner) return;
	}

}


class DuplicateNameException extends \Exception {
  
}