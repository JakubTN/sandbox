<?php
/**
 * Database table operation.
 */
abstract class Repository extends Nette\Object
{
    /** @var Nette\Database\Connection */
    protected $connection;

    public function __construct(Nette\Database\Connection $db)
    {
        $this->connection = $db;
    }

    /**
     * Returns table from database.
     * @param string $name
     * @return Nette\Database\Table\Selection
     */
    protected function getTable($name = NULL)
    {
        if($name) {
            return $this->connection->table($name);
        } else {
            // název tabulky odvodíme z názvu třídy
            preg_match('#(\w+)Repository$#', get_class($this), $m);
            return $this->connection->table(lcfirst($m[1]));
        }
    }

    /**
     * Returns all rows from table.
     * @return Nette\Database\Table\Selection
     */
    public function findAll()
    {
        return $this->getTable();
    }

    /**
     * Returns rows by filter, i.e. array('name' => 'John').
     * @return Nette\Database\Table\Selection
     */
    public function findBy(array $by)
    {
        return $this->getTable()->where($by);
    }
    
    /**
     * Returns row specified by primary key.
     * @return Nette\Database\Table\ActiveRow
     */
    public function findById($id)
    {
        return $this->getTable()->get($id);
    }
    
    /**
     * Inserts new data into table.
     * @return Nette\Database\Table\ActiveRow
     */
    public function add($values)
    {
        return $this->getTable()->insert($values);
    }
    
    /**
     * Updates existing row in table.
     * @return Nette\Database\Table\ActiveRow
     */
    public function update($id, $values)
    {
        $this->getTable()->get($id)->update($values);
        
        return $this->getTable()->get($id);
    }
    
    /**
     * Removes existing row from table.
     * @return Nette\Database\Table\ActiveRow
     */
    public function remove($id)
    {
        return $this->getTable()->get($id)->delete();
    }
}