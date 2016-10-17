<?php

namespace App\Presenters;
use Nette;
//use App\Model;

class HomepagePresenter extends BasePresenter {

	public function startup() {
		parent::startup();
		$this->redirect('Dashboard:');
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
	}    
  
	/*public function renderDefault() {
		$this->template->anyVariable = 'any value';
	}*/
}