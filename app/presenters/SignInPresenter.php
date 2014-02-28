<?php

use Nette\Application\UI\Form;

class SignInPresenter extends BasePresenter {

    public function __construct(\Nette\DI\Container $context = NULL) {
        parent::__construct($context);
    }

    /**
     * 
     * @return \Nette\Application\UI\Form
     */
    public function createComponentSignIn() {
        $control = new \BaseFormControl();
        $form = $control->getForm();
        $form->setTranslator($this->translator);
        $form->addText('login', 'Surname')
                ->setRequired('Musíte zadat login');
        $form->addPassword('password', 'Password')
                ->setRequired('Musíte zadat heslo');
        $form->addSubmit('submit', 'OK');
        $form->onSuccess[] = callback($this, 'signIn');
        $form->setMethod('post');
        return $form;
    }

    /**
     * 
     * @param \Nette\Application\UI\Form $form
     */
    public function signIn(Form $form) {
        $values = $form->getValues();
        $username = $values->offsetGet('login');
        $password = $values->offsetGet('password');
        try {
            $this->user->login($username, $password);
        } catch (Nette\Security\AuthenticationException $e) {
// echo 'Chyba: ', $e->getMessage();
        }
        $this->user->isLoggedIn() ? $this->flashMessage('You are logged in.', 'info') : $this->flashMessage('Bad login or password.', 'error');
        $redirect = $this->user->isLoggedIn() ? 'Homepage:default' : 'this';
        $this->redirect($redirect);
    }

    public function render() {
        
    }

    public function actionLogout() {
        $this->getUser()->logout();
        $this->redirect('Homepage:default');
    }

}
