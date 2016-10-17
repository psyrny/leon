<?php
namespace App\Presenters;
use Nette;

/**
 * Description of OwnerPresenter
 *
 * @author Tutin
 */
class OwnerPresenter extends BasePresenter {
  
	public function startup() {
		parent::startup();
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
	}  
  
	public function renderOwners() {
		$this->template->owners = $this->owners->getOwners();
	}
  
}