<?php
namespace App\Model;
use Nette;

/**
 * Description of Users
 *
 * @author Tutin
 */
class Users extends Nette\Object {
	
	/** @var Nette\Database\Context */
	private $database;
  private $tbl_user = 'user';

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}
  
  /**
   * Get all users from table
   * @return array users
   * @author Tutin
   */
	public function getUsers() {
		return $this->database->table($this->tbl_user)->order('id ASC');
	}  
  
  /**
   * Get user row
   * @param int $id user id
   * @return array user row
   * @author Tutin
   */  
	public function getUser($id) {
    if($id) {
      return $this->getUsers()->where('id', $id)->fetch();
		}
	}  
  
}