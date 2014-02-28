<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {

    /**
     *
     * @var Nette\Security\User 
     */
    protected $user;

    public function __construct(\Nette\DI\Container $context = NULL) {
        parent::__construct($context);
        $this->user = $this->getService('user');
        //$this->user->setAuthenticator($username, $password);
    }

    public function renderDefault() {
        $view = $this->getUser()->isLoggedIn() ? 'LoggedIn' : 'Default';
        $this->setView($view);
    }

}
