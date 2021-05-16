<?php
class MainController extends Controller
{

	public function ActionIndex()
	{
		$this->view->Generate('main/mainView.php');
		return true;
	}

	public function ActionTest()
	{
		$this->view->Generate('main/testView.php');
		return true;
	}
}
