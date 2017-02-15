<?php
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\App;

use OCA\SkibaAddins\Db\ArchiveInfo;
use OCP\AppFramework\Http;

OCP\User::checkLoggedIn();
OCP\JSON::checkAppEnabled('skibaaddins');
OCP\JSON::callCheck();

$app = new App('skibaaddins');
$container = $app->getContainer();
$controller = $container->query(
	'OCA\SkibaAddins\Controller\ArchiveController'
);

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$controller->destroy($_POST['fileid']);
	$controller->create($_POST['fileid'], $_POST['archived']);

	OCP\JSON::success();
} else {
	$data = $controller->index()->getData();
	$result = array();
	foreach ($data as $row) {
		array_push($result, $row->jsonSerialize()['fileid']);
	}
	OCP\JSON::success(array('data' => $result));
}