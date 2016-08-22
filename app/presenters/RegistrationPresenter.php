<?php
namespace App\Presenters;
use Nette;
use App\Model\OwnerManager;

/**
 * Description of RegistrationPresenter
 *
 * @author Tutin
 */
class RegistrationPresenter extends BasePresenter {
	
	/** @var Nette\Database\Context */
	private $database;	
	
	public function __construct(Nette\Database\Context $database){
	  $this->database = $database;
	}	
  
	protected function createComponentRegisterForm() {
		$form = new Nette\Application\UI\Form;
		$form->addText('firstname', 'Křestní jméno:')
			->setRequired('Prosím vyplňte křestní jméno.');		
		$form->addText('email', 'E-mail:')
			->addRule($form::EMAIL, 'Email nemá správný formát')
			->setRequired('Prosím vyplňte registrační email.');
		$form->addPassword('pass', 'Heslo:')
			->addRule($form::MIN_LENGTH, "Heslo musí mít minimálně %d znaků", 8)				
			->setRequired('Prosím zvolte si heslo.');
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
		$owner = new OwnerManager($this->database);
		//\Tracy\Debugger::barDump($values, 'Registration form input');
		$owner->addOwner($values->firstname, $values->email, $values->pass);
		$this->flashMessage('Registrace byla úspěšná. Ještě bude nutné registraci potvrdit z emailu, který jsme vám právě poslali.', 'success');
		$this->redirect('this');
		// TODO - osetreni vyjimky duplicity registrace - email je unikatni
		// TODO logger
		// TODO poslani emailu
		// TODO vlozeni do SE
		// TODO tvorba strukturt - owner/accountno/..ukladani hesla?
		// TODO spravne zalozeni role - prozkoumani funkci v nette pro role
	}  	
  
}