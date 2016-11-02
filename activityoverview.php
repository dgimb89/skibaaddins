<?php
OCP\User::checkAdminUser();
$tmpl = new OCP\Template( 'skibaaddins', 'activityoverview');
return $tmpl->fetchPage();