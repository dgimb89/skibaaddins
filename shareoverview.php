<?php
OCP\User::checkAdminUser();
$tmpl = new OCP\Template( 'skibaaddins', 'shareoverview');
return $tmpl->fetchPage();