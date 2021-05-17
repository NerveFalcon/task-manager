<?php
class MainController extends Controller
{

	public function ActionChat()
	{
		$messages = array();
		for ($i = 0; $i < 5; $i++)
		{
			$messages[$i]['author'] = "author";
			$messages[$i]['date'] = "date";
			$messages[$i]['text'] = "text";
		}

		$this->view->Generate('main/mainView.php', $messages);
		return true;
	}

	public function ActionTest()
	{
		$this->view->Generate('main/testView.php');
		return true;
	}
}
