<?php
class MainController extends Controller
{
	public function __construct() {
		$this->model = new MainModel;
        parent::__construct();
	}
	public function ActionChat()
	{
		$messages = $this->model->GetMessages();
		// for ($i = 0; $i < 5; $i++)
		// {
		// 	if ($i != 2){
		// 		$messages[$i]['author'] = "author$i";
		// 		$messages[$i]['text'] = str_repeat("text ", 50);
		// 	}
		// 	else{
		// 		$messages[$i]['author'] = $_SESSION['user'];
		// 		$messages[$i]['text'] = "asdasd:";
		// 	}
		// 	$messages[$i]['date'] = "date";
			
		// }
		foreach ($messages as $key => $value) {
			$fio = explode(' ', $value['fio']);
			$messages[$key]['fio'] = $fio[0] . " " . $fio[1][0] . ". " . $fio[2][0] . ".";
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
