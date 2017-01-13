<?php
namespace App\Presenters;
use Nette;
use App\Model\OwnerManager;
use App\Model\Owners;
use App\Model\Logger;
use Tracy\Debugger;

/**
 * Description of RegistrationPresenter
 *
 * @author Tutin
 */
class RegistrationPresenter extends BasePresenter {
	
	/** @var Nette\Database\Context */
	private $database;	
	/*@var $logger - promenna pro inicializaci loggeru*/
	private $logger;
	/*@var $log_path - variable definition of logger directory path, where save file*/
	private $log_path;	
	/*@var $log_filename - variable definition of logger save filename*/
	private $log_filename = 'registrace.log';		
	
	public function __construct(Nette\Database\Context $database){
		$this->database = $database;
		$this->log_path = realpath(__DIR__ . '/../..').'/www/logs/';
		$this->logger = new Logger($this->log_path, $this->log_filename);			  
	}	
  
	protected function createComponentRegisterForm() {
		$form = new Nette\Application\UI\Form;
		$form->addText('firstname', 'Křestní jméno:')
			->setAttribute('placeholder', 'křestní jméno')
			->setRequired('Prosím vyplňte křestní jméno.');		
		
		$form->addText('email', 'E-mail:')
			->setType('email')
			->setAttribute('autocomplete', 'off')
			->setAttribute('placeholder', 'registrační email')
			->addRule($form::EMAIL, 'Email nemá správný formát')
			->setRequired('Prosím vyplňte registrační email.');
		
		$form->addPassword('pass', 'Heslo:')
			->setType('password')
			->setAttribute('autocomplete', 'off')
			->setAttribute('placeholder', 'zvolte si heslo')
			->addRule($form::MIN_LENGTH, "Heslo musí mít minimálně %d znaků", 8)				
			->setRequired('Prosím zvolte si heslo.');
		
		/*$form->addPassword('pass', 'Choose password:')
			->setRequired('Choose your password')
			->addRule($form::MIN_LENGTH, 'The password is too short: it must be at least %d characters', 3);*/

		/*$form->addText('pass', 'Heslo:')
			->setType('password')
			->setAttribute('autocomplete', 'off')
			->setAttribute('placeholder', 'zvolte si heslo')
			->addRule($form::EMAIL, 'Email nemá správný formát')
			->setRequired('Prosím zvolte si heslo.');*/
		
		$form->addSubmit('send', 'Registrovat se');
		// call method registerFormSucceeded() on success
		$form->onSuccess[] = array($this, 'registerFormSucceeded');
		return $form;
	}  
	
	/**
	* Callback metoda pri uspesnem odeslani formulare - registrace
	* @param type $form instance formulare
	* @param array $values hodnoty formulare
	* @see createComponentRegisterForm
	*/	
	public function registerFormSucceeded($form, $values) {
		
		$owners = new  Owners($this->database);
		$exists = $owners->ownerExists($values->email);
		
		//Debugger::barDump($values, 'Registration form input');
		//Debugger::barDump($exists, 'Owner exists');
		
		// testuju duplicitni email, uzivatel musi zadat jiny
		if (is_array($exists)&&(count($exists)>0)) {
			$this->flashMessage('Uživatel již existuje. Zadejte prosím jiný registační email.', 'alert');
			$this->logger->logit("ERROR", " Uzivatel jiz existuje -  email=".$values->email."");			
		}  else {
		// vlozeni noveho ownera
			$owner_m = new OwnerManager($this->database);
			if ($owner_m->addOwner($values->firstname, $values->email, $values->pass) ) {
				// vytvorim strom slozek pro ownera - TODO - nejaka trida na directory v nette?
				$owners->createOwnerFolderTree();
			}
			$this->flashMessage('Registrace byla úspěšná. Ještě bude nutné registraci potvrdit z emailu, který jsme vám právě poslali.', 'success');
			$this->redirect('this');			
		}
		
		// TODO - kontrola delky hesla nejde - nevypise se info u inputu...
		// TODO - osetreni vyjimky duplicity registrace - email je unikatni - DONE
		// TODO logger do souboru i do DB - kvuli prehledu akci uzivatle?
		// TODO poslani emailu
		// TODO vlozeni do SE
		// TODO tvorba strukturt - owner/accountno/..ukladani hesla?
		// TODO spravne zalozeni role - prozkoumani funkci v nette pro role
	}  	
  
}