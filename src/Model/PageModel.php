<?php

namespace Model;

use Helper\PdoConnexion;

/**
 * Class PageModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Model
 */
class PageModel
{
    /** @var null|\PDO $pdo */
    private $pdo;

    /**
     * PageModel constructor.
     * gets PDO connection
     */
    public function __construct()
    {
        $this->pdo = PdoConnexion::get();
    }

    /**
     * returns all the pages
     * @return null|array list of pages
     */
    public function findAll(): ?array
    {

    }
}