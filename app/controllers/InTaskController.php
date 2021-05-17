<?php
class InTaskController extends Controller
{
	public function ActionList(int $page = 1)
	{
		$countPages = 12;
		$pages = [$countPages, $page];
		$tasks = array();
		for ($i = 1; $i < 5; $i++)
		{
			$tasks[$i]['id'] = $i;
			$tasks[$i]['title'] = "title";
			$tasks[$i]['desc'] = "description";
			$tasks[$i]['from'] = "from";
			$tasks[$i]['to'] = "to";
			$tasks[$i]['deadline'] = "deadline";
			$tasks[$i]['status'] = "status";
			$tasks[$i]['OtherStatus'] = "На коррекцию";
			$tasks[$i]['DoneStatus'] = "Принять";
			$tasks[$i]['attachment'] = "url";
			$tasks[$i]['type'] = "in";
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
