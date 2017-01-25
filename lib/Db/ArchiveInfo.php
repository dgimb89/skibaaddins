<?php
namespace OCA\SkibaAddins\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class ArchiveInfo extends Entity implements JsonSerializable {

    protected $title;
    protected $content;
    protected $userId;

    public function jsonSerialize() {
        return [
            'fileid' => $this->fileid,
            'archived' => $this->archived
        ];
    }
}