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
	/** @var $tbl_owner - tabulka pro praci s uzivatelema*/
	private $tbl_owner = '_owner';
	/*@var $logger - promenna pro inicializaci loggeru*/
	private $logger;
	/*@var $log_path - variable definition of logger directory path, where save file*/
	private $log_path;	
	/*@var $log_filename - variable definition of logger save filename*/
	private $log_filename = 'owners.log';	

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
		$this->log_path = realpath(__DIR__ . '/../..').'/www/logs/';
		$this->logger = new Logger($this->log_path, $this->log_filename);
	}
  
	/**
	 * Get all users from table
	 * @return array owners
	 * @author Tutin
	 */
	public function getOwners() {
		$this->logger->logit('DEBUG', 'funkce - getOwners()');
		//$this->logger->logit('DEBUG', json_encode($this->database->table($this->tbl_owner)->order('id ASC')));
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
			$this->logger->logit('DEBUG', 'funkce - getOwner(), ID = '.$id.'');
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
			$this->logger->logit('DEBUG', 'funkce - ownerExists(),  email = '.$email.'');
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