<?php
namespace App\Model;
use Nette;

/**
 * Description of Owners
 *
 * @author Tutin
 */
class Owners extends Nette\Object {
	
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
	/** @var $tbl_owner - tabulka pro praci s uzivatelema*/
	private $tbl_owner = '_owner';	

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}
  
	/**
	 * Get all users from table
	 * @return array owners
	 * @author Tutin
	 */
	public function getOwners() {
		return $this->database->table($this->tbl_owner)->order('id ASC');
	}  
  
	/**
	 * Get user row
	 * @param int $id owner id
	 * @return array owner row
	 * @author Tutin
	 */  
	public function getOwner($id) {
		if($id) {
			return $this->getOwners()->where('id', $id)->fetchAll();
		}
	}  
	
	/**
	 * Get owner row order user email
	 * @param int $email  - owner email, unikatni email
	 * @return array owner row if owner exists
	 * @author Tutin
	 */  	
	public function ownerExists($email) {
		if ($email) {
			return $this->getOwners()->where(self::COLUMN_EMAIL, $email)->fetchAll();
		}
	}
	
	/**
	 * Add new owenr to DB
	 * @param array $data  - pole dat pro vlozeni do DB
	 * @return object - objekt zaznamu v DB
	 * @author Tutin
	 * @todo vkladat i vcetne ROLE ownera
	 */  		
	public function addOwner($data) {
		if($data) {
			try {
				return $this->database->table($this->tbl_owner)->insert($data);
			} catch (Nette\Database\UniqueConstraintViolationException $e) {
				Debugger::log("ERROR - addOwner - uzivatel  '$data->email' jiz existuje");
				throw new DuplicateNameException;
			}
		}
	}

	/*public function editOwner($id, $data)
	{
		if($id && $data) {
			return $this->getUsers()->where('id', $id)->update($data);
		}
	}	
	
	public function removeOwner($user_id) {
		if ($user_id) {
			$data = array(
				'del_flag' => 1
				);
			return $this->database->table('users')->where('id', $user_id)->update($data);
		}
	}

	public function undoRemoveOwner$user_id)
	{
		if($user_id) {
			$data = array(
				'del_flag' => 0
				);
			return $this->database->table('users')->where('id', $user_id)->update($data);
		}
	}*/

  
	/**
	 * Funkce se postara o vytvoreni struktury slozek pro prave registrovaneho uzivatele
	 */
	public function createOwnerFolderTree() {
		
	}
}

class DuplicateNameException extends \Exception {
  
}