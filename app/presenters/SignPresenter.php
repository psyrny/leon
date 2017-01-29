<?php
namespace App\Presenters;
use Nette;
use Tracy\Debugger;
//use App\Forms\SignFormFactory;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter {
	/** @var SignFormFactory @inject */
	//public $factory;

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	/*protected function createComponentSignInForm() {
		$form = $this->factory->create();
		$form->onSuccess[] = function ($form) {
			$form->getPresenter()->redirect('Homepage:');
		};
		return $form;
	}*/

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm() {
		//Debugger::log('Testovaci log', \Tracy\ILogger::ERROR );
		$form = new Nette\Application\UI\Form;
		$form->addText('email', 'Email:')
			->addRule($form::EMAIL, 'E-mail nemá správný formát')
			->setRequired('Prosím vyplňte váš email.');
		$form->addPassword('password', 'Heslo:')
			->setRequired('Prosím napište heslo.');
		$form->addCheckbox('remember', 'zapamatovat');    
		$form->addSubmit('send', 'Přihlásit se');
		// call method signInFormSucceeded() on success
		$form->onSuccess[] = array($this, 'signInFormSucceeded');
		return $form;
	}  
  
	public function signInFormSucceeded($form, $values) {
		if ($values->remember) {
			$this->getUser()->setExpiration('14 days', FALSE);
		} else {
			$this->getUser()->setExpiration('20 minutes', TRUE);
		}    
    
		try {
			$this->getUser()->login($values->email, $values->password);
		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
			$this->flashMessage($e->getMessage(), 'error');
			$this->redirect('this');
		}
		Debugger::log("DEBUG - LOGIN FORM - prihlaseni uzivatele: $values->email");
		$this->flashMessage('Byl jsi úspěšně přihlášen.', 'success');
		$this->redirect('Homepage:');
	}  
  
	/**
	* Logout action
	 * https://doc.nette.org/cs/2.4/access-control
	*/
	public function actionOut() {
		Debugger::log("DEBUG - LOGOUT - odhlaseni uzivatele: ". $this->user->getIdentity()->email.", ID = ".$this->user->getId().""); 
		$this->getUser()->logout();
		$this->flashMessage('Odhlášen');
		$this->redirect('in');
	}

}
