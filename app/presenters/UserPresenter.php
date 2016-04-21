<?php
namespace App\Presenters;
use Nette;

/**
 * Description of UserPresenter
 *
 * @author Tutin
 */
class UserPresenter extends BasePresenter {
  
  public function startup() {
		parent::startup();
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
	}  
  
	public function renderUsers() {
		$this->template->users = $this->users->getUsers();
	}
  
}