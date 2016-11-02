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


OCP\JSON::checkAppEnabled('skibaaddins');
OCP\JSON::checkAppEnabled('files_sharing');
OCP\JSON::callCheck();

OCP\User::checkLoggedIn();

$shareManager = \OC::$server->getShareManager();
$userUID = \OC::$server->getUserSession()->getUser()->getUID();

// Get all shares
$userShares = $shareManager->getSharedWith($userUID, \OCP\Share::SHARE_TYPE_USER, null, -1, 0);
$groupShares = $shareManager->getSharedWith($userUID, \OCP\Share::SHARE_TYPE_GROUP, null, -1, 0);
$shares = array_merge($userShares, $groupShares);

$formatted = [];
foreach ($shares as $share) {
	$userFolder = \OC::$server->getRootFolder()->getUserFolder($share->getSharedBy());
	$nodes = $userFolder->getById($share->getNodeId());

	if (empty($nodes)) {
		throw new NotFoundException();
	}
	$node = $nodes[0];

	$formatted[$node->getId()] = $userFolder->getRelativePath($node->getPath());
}

OCP\JSON::success(array('data' => $formatted));