<?php

namespace AdminModule;

use Nette\Application\UI\Form;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends \BasePresenter
{
    protected function startup()
    {
        parent::startup();

        $this->user->getStorage()->setNamespace('admin');
        $this->user->setAuthenticator($this->context->adminAuthenticator);
    }

    public function actionIn()
	{
		if($this->user->isLoggedIn()) {
			$this->redirect('Default:default');
		}

        $this->template->metaTitle = 'Prihlásenie | example.com';
	}

    public function actionOut()
    {
        $this->user->logout(TRUE);
        $this->flashMessage('Odhlásenie úspešné!', 'alert-success');
        $this->redirect('in');
    }

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = new Form;
		
		$form->addProtection();
		$form->addText('email', 'E-mail')
			 ->setRequired('Zadaj tvoju e-mailovú adresu!');
		$form->addPassword('password', 'Heslo')
			 ->setRequired('Zadaj tvoje heslo!');
		$form->addCheckbox('remember', 'Zapamätať prihlásenie');
		$form->addSubmit('signin', 'Prihlásiť');
		
		$form->onSuccess[] = $this->signInFormSucceeded;
		
		return $form;
	}


	public function signInFormSucceeded($form)
	{
		$values = $form->getValues();

		if ($values->remember) {
			$this->user->setExpiration('14 days', FALSE);
		} else {
			$this->user->setExpiration('20 minutes', TRUE);
		}

		try {
			$this->user->login($values->email, $values->password);
			$this->flashMessage('Prihlásenie úspešné!', 'alert-success');
			$this->redirect('Default:');

		} catch (Nette\Security\AuthenticationException $e) {
			$this->flashMessage('Nesprávne meno alebo heslo!', 'alert-danger');
		}
	}
}
