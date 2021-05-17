<?php
return array(
	''			=>	array(
		'controller'	=>	'main',
		''				=>	'chat',
	),
	'auth' 	=>	array(
		'controller'	=>	'auth',
		''				=>	'auth',
		'logout'		=>	'logout',
	),
	'inTasks' 	=>	array(
		'controller'	=>	'inTask',
		''				=>	'list',
	),
	'inTask' 	=>	array(
		'controller'	=>	'inTask',
		''				=>	'task',
	),
	'outTasks' 	=>	array(
		'controller'	=>	'outTask',
		''				=>	'list',
	),
	'outTask' 	=>	array(
		'controller'	=>	'outTask',
		''				=>	'task',
		'create'		=>	'create',
		'edit'			=>	'edit',
	),
	'user'		=> 	array(
		'controller'	=>	'admin',
		''				=>	'userList',
		'create'		=>	'userCreate',
		'edit'			=>	'userEdit',
	),
	'position'		=> 	array(
		'controller'	=>	'admin',
		''				=>	'positionList',
		'create'		=>	'positionCreate',
		'edit'			=>	'positionEdit',
	),
	'test'		=>	array(
		'controller'	=>	'main',
		''				=>	'test',
	),
);
