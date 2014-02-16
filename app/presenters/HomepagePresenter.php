<?php

use Nette\Application\UI\Form;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {

    /** @var Nette\Database\Connection */
    private $db;

    /** @var Autor */
    private $autorModel;

    protected function startup() {
        parent::startup();
        $this->db = $this->context->connection;
    }

    /**
     * 
     * @param type $id
     */
    public function actionDefault($id) {
        
    }

    /**
     * 
     * @return \Nette\Application\UI\Form
     */
    public function createComponentInsertForm() {
        $form = new Form;
        $form->setTranslator($this->translator);
        $form->addText('name', 'Name');
        $form->addText('surname', 'Surname');
        $form->addSubmit('submit', 'OK');
        $form->onSuccess[] = callback($this, 'insertForm');
        $form->setMethod('post');
        return $form;
    }

    /**
     * 
     * @param \Nette\Application\UI\Form $form
     */
    public function insertForm(Form $form) {
        $values = $form->getValues();
        $this->autorModel = new Autor($this->db);
        $this->autorModel->inserAutor($values);
    }

    public function renderDefault() {
        $table = $this->db->table(Autor::TABLE_NAME);
        $this->template->table = $table;
    }

}
