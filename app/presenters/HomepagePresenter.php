<?php

use Nette\Application\UI\Form;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {

    /** @var Nette\Database\Connection */
    private $db;
    
    const TABLE_NAME = 'autors', //TODO table_name
            COLUMN_ID = 'id',
            COLUMN_NAME = 'name',
            COLUMN_SURNAME = 'surname';

    protected function startup() {
        parent::startup();
        $this->db = $this->getContext()->connection;
    }

    public function actionDefault($id) {
    }

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

    public function insertForm(Form $form) {
        $values = $form->getValues();
        $name = $values->offsetGet(self::COLUMN_NAME);
        $surname = $values->offsetGet(self::COLUMN_SURNAME);
        $this->db->query('INSERT INTO '.self::TABLE_NAME.' ('.self::COLUMN_NAME.', '.self::COLUMN_SURNAME.') VALUES (?,?);', $name, $surname);
    }

    public function renderDefault() {
        $table = $this->db->table(self::TABLE_NAME);
        $this->template->table = $table;
    }

}
