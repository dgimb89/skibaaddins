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

namespace OCA\SkibaAddins\AppInfo;

use OCP\AppFramework\App;

$eventDispatcher = \OC::$server->getEventDispatcher();
$eventDispatcher->addListener('OCA\Files::loadAdditionalScripts', function() {
	script('skibaaddins', 'script');
	style ('skibaaddins', 'style' );
});

\OCP\App::registerAdmin('skibaaddins', 'shareoverview');
\OCP\App::registerAdmin('skibaaddins', 'activityoverview');