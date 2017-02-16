<?php
namespace OCA\SkibaAddins\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class ArchiveMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'skibaaddins_archive', '\OCA\SkibaAddins\Db\ArchiveInfo');
    }

    public function find($id) {
        $sql = 'SELECT * FROM *PREFIX*skibaaddins_archive WHERE id = ?';
        return $this->findEntity($sql, [$id]);
    }

    public function findByFileId($fileid) {
        $sql = 'SELECT * FROM *PREFIX*skibaaddins_archive WHERE fileid = ?';
        return $this->findEntity($sql, [$fileid]);
    }

    public function findAll() {
        $sql = 'SELECT * FROM *PREFIX*skibaaddins_archive WHERE archived';
        return $this->findEntities($sql);
    }
}