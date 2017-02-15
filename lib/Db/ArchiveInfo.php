<?php
namespace OCA\SkibaAddins\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class ArchiveInfo extends Entity implements JsonSerializable {

    protected $fileid;
    protected $archived;

    public function jsonSerialize() {
        return [
            'fileid' => intval($this->fileid),
            'archived' => $this->archived
        ];
    }
}