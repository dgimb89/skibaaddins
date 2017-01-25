<?php
namespace OCA\SkibaAddins\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class NoteMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'skibaaddins_archive', '\OCA\SkibaAddins\Db\ArchiveInfo');
    }

    public function find($fileId) {
        $sql = 'SELECT * FROM *PREFIX*skibaaddins_archive WHERE fileid = ?';
        return $this->findEntity($sql, [$id, $userId]);
    }

    public function findAll() {
        $sql = 'SELECT * FROM *PREFIX*skibaaddins_archive';
        return $this->findEntities($sql);
    }

}