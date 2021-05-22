<?php
class OutTaskController extends Controller
{
	public function ActionList(int $page = 1)
	{
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
			$tasks[$i]['deadline'] = "deadline";
			$tasks[$i]['id_status'] = "status";
			$tasks[$i]['OtherStatus'] = "На коррекцию";
			$tasks[$i]['DoneStatus'] = "Принять";
			$tasks[$i]['attachment'] = "url";
			$tasks[$i]['type'] = "out";
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
		$task = array();
		$task['id'] = $id;
		$task['title'] = "title";
		$task['desc'] = "description";
		$task['from'] = "from";
		$task['to'] = "to";
		$task['deadline'] = "deadline";
		$task['status'] = "status";
		$task['DoneStatus'] = "Принять";
		$task['attachment'] = "url";

		$this->view->generate('task/outTaskView.php', $task);
		return true;
	}

	public function ActionCreate()
	{
		if (!empty($_POST))
		{
			header("Location: /outTask");
			return true;
		}

		$this->view->generate('task/createView.php');
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
