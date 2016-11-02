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
use OCA\Activity\Api;
use OCP\IDBConnection;

OCP\JSON::checkAppEnabled('skibaaddins');
OCP\JSON::callCheck();
OCP\User::checkAdminUser();

$result = array();
$query = \OCP\DB::prepare('SELECT * FROM `*PREFIX*activity` ORDER BY activity_id DESC')->execute();
while ($row = $query->fetchRow()) {
	// skip self-sharing activity for overview
	if($row['type'] === 'shared' && $row['user'] === $row['affecteduser']) continue;

	$result[] = array(
		'activity_id' => $row['activity_id'],
		'file' => $row['file'],
		'timestamp' => date("d.m.y H:i:s", $row['timestamp']),
		'type' => $row['type'],
		'user' => $row['user'],
		'affecteduser' => $row['affecteduser'] !== $row['user'] ? $row['affecteduser'] : '',
		);
}

OCP\JSON::success(array('data' => $result));