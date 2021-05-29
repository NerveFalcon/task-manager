<?php
class MainController extends Controller
{

	public function ActionChat()
	{
		$messages = $this->model->GetMessages();
		$messages = array();
		// for ($i = 0; $i < 5; $i++)
		// {
		// 	if ($i != 2){
		// 		$messages[$i]['author'] = "author$i";
		// 		$messages[$i]['text'] = "text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text ";
		// 	}
		// 	else{
		// 		$messages[$i]['author'] = $_SESSION['user'];
		// 		$messages[$i]['text'] = "asdasd:";
		// 	}
		// 	$messages[$i]['date'] = "date";
		// }

		$this->view->Generate('main/mainView.php', $messages);
		return true;
	}

	public function ActionTest()
	{
		$this->view->Generate('main/testView.php');
		return true;
	}
}
