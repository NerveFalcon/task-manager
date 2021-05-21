<?php
class AuthController extends Controller
{
	public function ActionAuth()
	{
		if (!empty($_POST))
		{
			$_SESSION['user'] = $_POST['email'];
			header("Location: /");
			return true;
		}
		$this->view->Generate('auth/authView.php', null, "authView.php");
		return true;
	}

	public function ActionLogout()
	{
		session_unset();
		header("Location: /");
		return true;
	}
}
