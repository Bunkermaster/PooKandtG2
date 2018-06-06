<?php

namespace Model;

use Helper\AbstractModel;

/**
 * Class PageModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Model
 */
class PageModel extends AbstractModel
{
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
        $this->handleError($stmt);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if ([] === $data) {
            return null;
        }

        return $data;
    }

    /**
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $sql = "SELECT 
  `title`, 
  `slug`, 
  `h1`, 
  `p`, 
  `nav-title`, 
  `span-class`, 
  `span-text`, 
  `img-alt`, 
  `img-src` 
FROM 
  `page` 
WHERE 
  `id` = :id
  ;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $this->handleError($stmt);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ([] === $data) {
            return null;
        }

        return $data;
    }

    /**
     * @param string $slug
     * @return array
     */
    public function findBySlug(string $slug): array
    {
        $sql = "SELECT `h1`, `p`, `span-class`, `span-text`, `img-alt`, `img-src` FROM `page` WHERE `slug` = :slug;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $this->handleError($stmt);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ([] === $data) {
            return null;
        }

        return $data;
    }

    /**
     * @param array $data
     */
    public function edit(array $data): void
    {
        $this->cleanUp($data);
        $sql = "UPDATE
  `page`
SET
  `slug` = :slug,
  `title` = :title,
  `h1` = :h1,
  `p` = :p,
  `span-class` = :spanclass,
  `span-text` = :spantext,
  `img-alt` = :imgalt,
  `img-src` = :imgsrc,
  `nav-title` = :navtitle
WHERE
  `id` = :id
;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $data['id']);
        $stmt->bindValue(':slug', $data['slug']);
        $stmt->bindValue(':title', $data['title']);
        $stmt->bindValue(':h1', $data['h1']);
        $stmt->bindValue(':p', $data['p']);
        $stmt->bindValue(':spanclass', $data['span-class']);
        $stmt->bindValue(':spantext', $data['span-text']);
        $stmt->bindValue(':imgalt', $data['img-alt']);
        $stmt->bindValue(':imgsrc', $data['img-src']);
        $stmt->bindValue(':navtitle', $data['nav-title']);
        $stmt->execute();
        $this->handleError($stmt);
    }

    /**
     * @param array $data
     * @return int
     */
    public function add(array $data): ?int
    {
        $sql = "INSERT INTO `page`
SET
  `slug` = :slug,
  `title` = :title,
  `h1` = :h1,
  `p` = :p,
  `span-class` = :spanclass,
  `span-text` = :spantext,
  `img-alt` = :imgalt,
  `img-src` = :imgsrc,
  `nav-title` = :navtitle;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':slug', $data['slug']);
        $stmt->bindValue(':title', $data['title']);
        $stmt->bindValue(':h1', $data['h1']);
        $stmt->bindValue(':p', $data['p']);
        $stmt->bindValue(':spanclass', $data['span-class']);
        $stmt->bindValue(':spantext', $data['span-text']);
        $stmt->bindValue(':imgalt', $data['img-alt']);
        $stmt->bindValue(':imgsrc', $data['img-src']);
        $stmt->bindValue(':navtitle', $data['nav-title']);
        $stmt->execute();
        $this->handleError($stmt);

        return $this->pdo->lastInsertId();
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $sql = "DELETE FROM `page` WHERE `id` = :id LIMIT 1;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $this->handleError($stmt);
    }
}
