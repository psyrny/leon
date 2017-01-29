<?php
namespace App\Presenters;
use Nette;
use Nette\Security\Passwords;
use Tracy\Debugger;

/**
 * Description of RegistrationPresenter
 *
 * @author Tutin
 */
class RegistrationPresenter extends BasePresenter {
	
	/** @var Nette\Database\Context */
	/*private $database;	
		
	public function __construct(Nette\Database\Context $database){
		$this->database = $database;
	}*/	
  
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
		
		$form->addSubmit('send', 'Registrovat se');
		// call method registerFormSucceeded() on success
		$form->onSuccess[] = array($this, 'registerFormSucceeded');
		return $form;
	}  

	/**
	 * Fce. pripravi data pro vlozeni noveho ownera do DB - z registracniho formulare
	 * @param array $values - hodnoty registracniho formulare
	 * @return array $ownerData - pole pro zalozeni ownera do DB
	 * @see $owners->addOwner($data)
	 */
	public function setNewOwnerData($values) {
		if (!$values) return;
		$ownerData = array(
					'firstname' => $values->firstname,
					'pass' =>  Passwords::hash($values->pass),
					'email' => $values->email,
					'dt_registration' => new \DateTime,
					'accountno' => date('ymdHis') 
					);
		return $ownerData;
	}
	
	/**
	* Callback metoda pri uspesnem odeslani formulare - registrace
	* @param type $form instance formulare
	* @param array $values hodnoty formulare
	* @see createComponentRegisterForm
	*/	
	public function registerFormSucceeded($form, $values) {
		
		$exists = $this->owners->ownerExists($values->email);
		
		//Debugger::barDump($values, 'Registration form input');
		//Debugger::barDump($exists, 'Owner exists');
		
		// testuju duplicitni email, uzivatel musi zadat jiny
		if (is_array($exists)&&(count($exists)>0)) {
			Debugger::log("ERROR - REGISTER FORM - uzivatel : email=".$values->email." jiz existuje");
			$this->flashMessage('Uživatel již existuje. Zadejte prosím jiný registrační email.', 'alert');
		}  else {
			// vlozeni noveho ownera
			if (empty($values->id)) {
				$data = $this->setNewOwnerData($values);
				$row = $this->owners->addOwner($data);			
				$ownerID = $row->id;
			}
			// vytvorim strom slozek pro ownera - TODO - nejaka trida na directory v nette?
			//$this->owners->createOwnerFolderTree();
			// TODO - do debugu vlozit i ID OWNERA - last_insert_id
			Debugger::log("DEBUG - REGISTER FORM - novy uzivatel: ID: ".$ownerID.",  email=".$values->email."");
			$this->flashMessage('Registrace byla úspěšná. Ještě bude nutné registraci potvrdit z emailu, který jsme vám právě poslali.', 'success');
			$this->redirect('this');			
		}
		
		
		// TODO poslani emailu
		// TODO vlozeni do SE
		// TODO tvorba strukturt - owner/accountno/..ukladani hesla?
		// TODO spravne zalozeni role - prozkoumani funkci v nette pro role
	}  	
	
}