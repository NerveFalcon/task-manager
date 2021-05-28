<?php
class InTaskController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new InTaskModel();
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
			$tasks[$key]['seen'] = rand(0, 1);
			if (rand(0, 1))
				$tasks[$key]['deadline'] = "2021-6-5";
			$tasks[$key]['diff'] = (new DateTime($tasks[$key]['deadline']))->diff(new DateTime)->format("%a");
		}

		$this->view->Generate('task/listView.php', [$pages, $tasks]);
		return true;
	}

	public function ActionTask(int $id)
	{
		if (!empty($_POST))
		{
		}
		$task = $this->model->GetTask($id);
		$task['comments'] = $this->model->GetComment($id);

		// $task = array();
		// $task['id'] = $id;
		// $task['title'] = "title";
		// $task['text'] = "description";
		// $task['id_from'] = "from";
		// $task['deadline'] = "deadline";
		// $task['status'] = "status";
		// $task['DoneStatus'] = "Принять";
		// $task['file_way'] = [['title' => 'file1', 'url' => 'url1.txt'], ['title' => 'file2', 'url' => 'url2.txt']];
		// $task['comments'] = [['author' => 'author1', 'text' => 'texttextext', 'date' => 'date'], ['author' => 'author2', 'text' => 'texttextext', 'date' => 'date']];

		$this->view->generate('task/inTaskView.php', $task);
		return true;
	}
}
