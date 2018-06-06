<?php

namespace Helper;

use Helper\PdoConnexion;

/**
 * Class AbstractModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Model
 */
abstract class AbstractModel
{
    /** @var null|\PDO $pdo */
    protected $pdo;

    /**
     * PageModel constructor.
     * gets PDO connection
     */
    public function __construct()
    {
        $this->pdo = PdoConnexion::get();
    }

    /**
     * @param \PDOStatement $stmt
     */
    public function handleError(\PDOStatement $stmt): void
    {
        if ($stmt->errorCode() !== '00000') {
            die("Mamaannn....");
        }
    }

    /**
     * @param array $data
     */
    protected function cleanUp(array &$data): void
    {
        $data = array_map("self::cleanUpCallBack", $data);
    }

    /**
     * @param $element
     * @return string
     */
    function cleanUpCallBack($element){
        return \htmlentities($element);
    }


    /**
     * Return all records or null.
     *
     * @return array|null
     */
    abstract public function findAll(): ?array;

    /**
     * Return a specific record by its id.
     *
     * @param int $id
     *
     * @return array
     */
    abstract public function find(int $id): array;

    /**
     * Insert a new record.
     *
     * @param array $data
     *
     * @return int|null
     */
    abstract public function add(array $data): ?int;

    /**
     * Update an existing record.
     *
     * @param array $data
     */
    abstract public function edit(array $data): void;

    /**
     * Delete an existing record by its id.
     *
     * @param int $id
     */
    abstract public function delete(int $id): void;
}
