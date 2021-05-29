<?php
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/Route.php';
require_once 'core/User.php';

session_start();

if (!isset($_SESSION['user']) && Route::GetUri() != "auth")
{
	if (isset($_COOKIE['c']))
		$_SESSION['user'] = $_COOKIE['c'];
	else
		header('Location: /auth');
}
$_SESSION['id'] = 1;
define('ISADMIN', true);


Route::start();
