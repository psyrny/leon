<?php
namespace App\Presenters;
use Nette;
use App\Model;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {
  
	/** 
   * @var Model\Users 
   * @inject
   */
	public $users;
  
  /**
   * @var Model\ConfigParameter
   * @inject
   */
  public $configParameter;  
  

  protected function startup() {
    parent::startup();
    $this->template->configParam = $this->configParameter;
    //$this->configParameter->projectName = 'KOKOS';
    //dump($this->configParameter->projectName);
  }  
  
  
  
	/**
	 * Inject dependency.
	 *
	 * @param Model\Users $users
	 */
	/*public function injectUsers(Model\Users $users) {
    $this->users = $users;
	}*/  
  
}