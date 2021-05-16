<?php
class Route
{
	public static function GetURI()
	{
		if (!empty($_SERVER["REQUEST_URI"]))
		{
			return trim($_SERVER["REQUEST_URI"], "/");
		}
		else
		{
			return false;
		}
	}

	public static function Start()
	{
		$routes = include_once('routes.php');
		$uri = explode('/', self::GetURI());
		$controlller = $routes[$uri[0]];

		if (count($controlller) > 2)
		{
			if (empty($uri[1]) || is_numeric($uri[1]))
			{
				$action = ucfirst($controlller['']);
				$params = array_slice($uri, 1);
			}
			else
			{
				$action = ucfirst($controlller[$uri[1]]);
				$params = array_slice($uri, 2);
			}
			$controlller = ucfirst($controlller['controller']);
		}
		else
		{
			$action = ucfirst($controlller['']);
			$params = array_slice($uri, 1);
			$controlller = ucfirst($controlller['controller']);
		}

		return self::Load($controlller, $action, $params);
	}

	static function Load($controllerName, $actionName, $param = array())
	{

		// добавляем префиксы
		$modelName = $controllerName . "Model";
		$controllerName = $controllerName . "Controller";
		$actionName = "Action" . $actionName;

		// подключаем файл с классом модели
		$modelPath = "app/models/" . $modelName . ".php";
		if (file_exists($modelPath))
		{
			include($modelPath);
		}

		// подключаем файл с классом контроллера
		$controllerPath = "app/controllers/" . $controllerName . '.php';
		if (file_exists($controllerPath))
		{
			include($controllerPath);
		}

		// создаем контроллер
		$controller = new $controllerName;

		if (!call_user_func_array(array($controller, $actionName), $param))
		{
			self::ErrorPage404();
		}
	}

	static function ErrorPage404()
	{
		$v = new View();
		$v->Generate('main/404View.php');
	}

	static function DevPage()
	{
		$v = new View();
		$v->Generate('main/devView.php');
	}
}
