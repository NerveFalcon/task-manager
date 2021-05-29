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
			// if(Model::IsAjax() && !empty($_POST['text'])) {
			$this->model->AddMessage();
			$messages = $this->model->GetMessages();
			$messages = $this->GetShortName($messages);
			// echo $this->GetChat($messages);

			header("Location: /");
			// return true;
		}

		// if(Model::IsAjax() && !empty($_POST['text'])) {
		// 	$this->model->AddMessage($_POST['text']);
		// 	$messages = $this->model->GetMessages();
		// 	$messages = $this->GetShortName($messages);
		// 	echo $this->GetChat($messages);

		// 	// header("Location: /");
		// 	return true;
		// }
		$messages = $this->model->GetMessages();
		$messages = $this->GetShortName($messages);


		if(Model::IsAjax()){
			echo $this->GetChat($messages);
			return true;
		}
		$this->view->Generate('main/mainView.php', $messages);
		return true;
	}


	public function ActionTest()
	{
		$this->view->Generate('main/testView.php');
		return true;
	}

	public function GetChat($messages) {
		$chat = '';
		foreach ($messages as $message) {
			$my = ($message['id'] == $_SESSION['id']) ? 'mymessage' : '';
			$chat .= 	"<div class='message " . $my . "'>
							<span class='author'>" . $message['fio'] . "</span>
							<span class='date'>" . $message['date'] . "</span>
							<p>" . $message['text'] . "</p>
						</div>";
		}
		
		return $chat;
	}

	public function GetShortName($messages) {
		foreach ($messages as $key => $value) {
			$fio = explode(' ', $value['fio']);
			$fio[1] = (!empty($fio[1])) ? substr($fio[1], 0, 2) . ". " : '';
			$fio[2] = (!empty($fio[1])) ? substr($fio[1], 0, 2) . "." : '';
			$messages[$key]['fio'] = $fio[0] . " " . $fio[1] . ". " . $fio[2] . ".";
		}
		return $messages;
	}
}
