<?php

/**
 * Autor model.
 */
class Autor extends Nette\Object {

    /** @var Nette\Database\Connection */
    private $db;

    const TABLE_NAME = 'autors',
            COLUMN_ID = 'id',
            COLUMN_NAME = 'name',
            COLUMN_SURNAME = 'surname';

    /**
     * 
     * @param Nette\Database\Connection $connection
     */
    public function __constructor(Nette\Database\Connection $connection) {
        $this->db = $connection;
    }

    /**
     * 
     * @param type $values
     */
    public function inserAutor($values) {
        $name = $values->offsetGet(Autor::COLUMN_NAME);
        $surname = $values->offsetGet(Autor::COLUMN_SURNAME);
        $this->db->query('INSERT INTO ' . self::TABLE_NAME . ' (' . self::COLUMN_NAME . ', ' . self::COLUMN_SURNAME . ') VALUES (?,?);', $name, $surname);
    }

}
