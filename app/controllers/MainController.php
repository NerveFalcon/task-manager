<?php
class MainController extends Controller
{
	public function __construct() {
		$this->model = new MainModel;
        parent::__construct();
	}
	public function ActionChat()
	{
		if(!empty($_POST)){
			$this->model->AddMessage();
			header("Location: /");
			return true;
		}
		$messages = $this->model->GetMessages();

		foreach ($messages as $key => $value) {
			$fio = explode(' ', $value['fio']);
			$messages[$key]['fio'] = $fio[0] . " " . substr($fio[1], 0, 2) . ". " . substr($fio[2], 0, 2) . ".";
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
