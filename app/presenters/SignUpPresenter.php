<?php

use Nette\Application\UI\Form;

class SignUpPresenter extends BasePresenter {

    public function __construct(\Nette\DI\Container $context = NULL) {
        parent::__construct($context);
    }

    protected function createComponentSignUp() {
        $control = new \BaseFormControl();
        $form = $control->getForm();
        $form->setTranslator($this->translator);
        $form->addText('realname', 'Name')
                ->setRequired('Zadejte své jméno.');
        $form->addText('login', 'Surname')
                ->setRequired('Zvolte si uživatelské jméno');
        $form->addPassword('password', 'Password')
                ->setRequired('Zvolte si heslo')
                ->addRule($form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaky', 6);
        $form->addPassword('passwordVerify', 'Verify again')
                ->setRequired('Zadejte prosím heslo ještě jednou pro kontrolu')
                ->addRule($form::EQUAL, 'Hesla se neshodují', $form['password']);
        $form->addSubmit('submit', 'OK');
        $form->onSuccess[] = callback($this, 'signUp');
        $form->setMethod('post');
        return $control;
    }

    /**
     * 
     * @param \Nette\Application\UI\Form $form
     */
    public function signUp(Form $form) {
        $values = $form->getValues();
        $realname = $values->offsetGet('realname');
        $username = $values->offsetGet('login');
        $password = $values->offsetGet('password');
        $pswd = Authenticator::calculateHash($password);
        $this->db->query('INSERT INTO users (realname,login, password) VALUES (?,?,?)', $realname, $username, $pswd);
        $this->redirect('SignIn:default');
    }   

    public function render() {
        
    }

}
