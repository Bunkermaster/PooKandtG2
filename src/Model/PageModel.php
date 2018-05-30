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
        $sql = "SELECT
  `id`,
  `slug`,
  `h1`,
  `p`,
  `span-class`,
  `span-text`,
  `img-alt`,
  `img-src`
FROM 
  `page`
;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if ([] === $data) {
            return null;
        }

        return $data;
    }
}