<?php
/**
 * ownCloud - skibaaddins
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Daniel Gimbatschki: <gimbatschki@elkom-plan.de>
 * @copyright Daniel Gimbatschki 2016
 */

use OCP\AppFramework\App;
use OCP\IDBConnection;

OCP\JSON::checkAppEnabled('skibaaddins');
OCP\JSON::checkAppEnabled('files_sharing');
OCP\JSON::callCheck();
OCP\User::checkAdminUser();

$shareManager = \OC::$server->getShareManager();
$query = \OCP\DB::prepare('SELECT * FROM `*PREFIX*share` s INNER JOIN `*PREFIX*filecache` f ON (s.file_source = f.fileid AND f.path NOT LIKE "files_trashbin/%") ORDER BY id DESC')->execute();

$result = [];
while ($row = $query->fetchRow()) {
	$result[] = array(
		'id' => $row['id'],
		'uid_initiator' => $row['uid_initiator'],
		'share_with' => $row['share_with'],
		'file_target' => $row['file_target'],
		'item_type' => $row['item_type'],
		);
}

OCP\JSON::success(array('data' => $result));