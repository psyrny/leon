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
			return $this->getOwners()->where('id', $id)->fetch();
		}
	}  
  
}