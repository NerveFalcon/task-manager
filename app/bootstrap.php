<?php
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/Route.php';
require_once 'core/User.php';

session_start();

if (!isset($_SESSION['user']) && Route::GetUri() != "auth")
{
	header('Location: /auth');
}
if ($_SESSION['user'] == "test")
	define('ISADMIN', true);
else
	define('ISADMIN', false);


Route::start();
