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

/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\SkibaAddins\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
$this 	->create('skibaaddins_ajax_getoriginalfolderstructure', 'ajax/getoriginalfolderstructure.php')
		->actionInclude('skibaaddins/ajax/getoriginalfolderstructure.php');

$this 	->create('skibaaddins_ajax_getsharesinfo', 'ajax/getsharesinfo.php')
		->actionInclude('skibaaddins/ajax/getsharesinfo.php');

$this 	->create('skibaaddins_ajax_getactivityinfo', 'ajax/getactivityinfo.php')
		->actionInclude('skibaaddins/ajax/getactivityinfo.php');

$this 	->create('skibaaddins_ajax_getarchiveinfo', 'ajax/getarchiveinfo.php')
		->actionInclude('skibaaddins/ajax/getarchiveinfo.php');