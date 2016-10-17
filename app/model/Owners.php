<?php
namespace App\Model;
use Nette;

/**
 * Description of Owners
 *
 * @author Tutin
 */
class Owners extends Nette\Object {
	
	/** @var Nette\Database\Context */
	private $database;
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
	 * Get user row order user email
	 * @param int $email  - owner email, unikatni email
	 * @return array owner row if owner exists
	 * @author Tutin
	 */  	
	public function ownerExists($email) {
		if ($email) {
			return $this->getOwners()->where('email', $email)->fetchAll();
		}
	}
	
	/*public function addOwner($data) {
		if($data) {
			return $this->database->table('users')->insert($data);
		}
	}

	public function editOwner($id, $data)
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