<?php
class OutTaskController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new OutTaskModel();
	}

	public function ActionList(string $filter = null, int $page = 1)
	{
		if (is_null($filter))
		{
			header("Location: /" . Route::GetURI() . "/await/$page");
		}
		if (count(array_diff(explode('+', $filter), $this->model->GetEnStatus())) > 0)
		{
			return false;
		}
		$countPages = 12;
		$pages = [$countPages, $page];
		$tasks = array();
		for ($i = 0; $i < 5; $i++)
		{
			$tasks[$i]['id'] = $i;
			$tasks[$i]['title'] = "title";
			$tasks[$i]['text'] = "description";
			$tasks[$i]['from'] = "from";
			$tasks[$i]['to'] = "to";
			$tasks[$i]['deadline'] = "2021-11-11";
			$tasks[$i]['id_status'] = "status";
			$tasks[$i]['OtherStatus'] = "На коррекцию";
			$tasks[$i]['DoneStatus'] = "Принять";
			$tasks[$i]['attachment'] = "url";
			$tasks[$i]['type'] = "out";
			$tasks[$i]['seen'] = rand(0, 1);
			if (rand(0, 1))
				$tasks[$i]['deadline'] = "2021-6-5";
			$tasks[$i]['diff'] = (new DateTime($tasks[$i]['deadline']))->diff(new DateTime)->format("%a");
		
		}

		$this->view->Generate('task/listView.php', [$pages, $tasks]);
		return true;
	}

	public function ActionTask(int $id = null)
	{
		if (!empty($_POST))
		{
		}
		$task = array();
		$task['id'] = $id;
		$task['title'] = "title";
		$task['desc'] = "description";
		$task['from'] = "from";
		$task['to'] = "to";
		$task['deadline'] = "deadline";
		$task['status'] = "status";
		$task['DoneStatus'] = "Принять";
		$task['file_way'] = [['title' => 'file1', 'url' => 'url1.txt'], ['title' => 'file2', 'url' => 'url2.txt']];
		$task['comments'] = [['fio' => 'author1', 'text' => 'texttextext', 'date' => 'date'], ['fio' => 'author2', 'text' => 'texttextext', 'date' => 'date']];

		$this->view->generate('task/outTaskView.php', $task);
		return true;
	}

	public function ActionCreate()
	{
		if (!empty($_POST))
		{

			// header("Location: /outTasks");
			// return true;
		}

		$workers = $this->model->getWorkers();

		$this->view->generate('task/createView.php', $workers);
		return true;
	}

	public function ActionEdit(int $id)
	{
		if (empty($id))
		{
			return false;
		}

		$this->view->generate('task/editView.php');
		return true;
	}
}
