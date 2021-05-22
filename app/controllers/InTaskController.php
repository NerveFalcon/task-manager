<?php
class InTaskController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new InTaskModel();
	}

	public function ActionList(int $page = 1)
	{
		$countPages = $this->model->GetCountInTasks();
		// echo $countPages;
		// return true;
		$pages = [$countPages, $page];
		$tasks = $this->model->GetListInTasks($page);
		foreach ($tasks as $key => $task)
		{
			$tasks[$key]['type'] = "in";
			$tasks[$key]['OtherStatus'] = "На коррекцию";
			$tasks[$key]['DoneStatus'] = "Принять";
		}

		$this->view->Generate('task/listView.php', [$pages, $tasks]);
		return true;
	}

	public function ActionTask(int $id)
	{
		if (empty($id))
		{
			return false;
		}
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
		$task['attachment'] = [['title' => 'file1', 'url' => 'url1'], ['title' => 'file2', 'url' => 'url2']];
		$task['comments'] = [['author' => 'author1', 'text' => 'texttextext', 'date' => 'date'], ['author' => 'author2', 'text' => 'texttextext', 'date' => 'date']];

		$this->view->generate('task/inTaskView.php', $task);
		return true;
	}
}
