<?php
class AuthController extends Controller
{
	public function ActionAuth()
	{
		if (!empty($_POST))
		{

			header("Location: /");
			return true;
		}
		$this->view->Generate('auth/authView.php', null, "authView.php");
		return true;
	}
}
