<?php
namespace App\Presenters;
use Nette;

/**
 * Description of DashboardPresenter
 *
 * @author Tutin
 */
class DashboardPresenter extends BasePresenter {
  
	public function startup() {
		parent::startup();
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
    //$this->configParameter->projectName = 'LOTOS';
	}  
  
	/**
	 * Default render view, setting variables to template
	 * notice: getUsers is injected in BasePresenter
	 * @return void variables for template
	 * @todo maybe better to call beforeRender
	 * @todo definition of privilegies and roles
	 */
	public function renderDefault() {
	  $this->template->owners = $this->owners->getOwners();
	}
  
  /*public function renderShow($id) {
    // získáme data z modelu a předáme do šablony
    $this->template->product = $this->model->getProduct($id);
  }*/  
  
}