<?php
class AuthController extends Controller
{
	public function __construct()
	{
		$this->model = new AuthModel();
		parent::__construct();
	}
	
	public function ActionAuth()
	{
		if (isset($_SESSION['user']))
		{
			header("Location: /");
			return true;
		}
		$err = [];
		if (!empty($_POST))
		{
			$input = $this->model->InputHandlerRecursive($_POST);
			$valid = $this->model->Validation($input['email'], $input['password']);
			if($valid)
			{
				$_SESSION['user'] = $this->model->GetFIO($input['email']);
				setcookie("c", md5($input['password']), time()+60*60*24);
				header("Location: /");
				return true;
			}
			else
				$err = "Не верные логин или пароль";
		}
		$this->view->Generate('auth/authView.php', [$err], "authView.php");
		return true;
	}

	public function ActionLogout()
	{
		session_unset();
		unset($_COOKIE);
		header("Location: /");
		return true;
	}
}
