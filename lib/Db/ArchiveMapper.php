<?php
namespace OCA\SkibaAddins\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class ArchiveMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'skibaaddins_archive', '\OCA\SkibaAddins\Db\ArchiveInfo');
    }

    public function find($fileid) {
        $sql = 'SELECT * FROM oc_skibaaddins_archive WHERE fileid = ?';
        return $this->findEntity($sql, [$fileid]);
    }

    public function findAll() {
        $sql = 'SELECT * FROM oc_skibaaddins_archive WHERE archived != "false"';
        return $this->findEntities($sql);
    }
}