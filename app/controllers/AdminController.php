<?php
class AdminController extends Controller
{
	public function __construct()
	{
		$this->model = new AdminModel();
		parent::__construct();
	}

	#region user

	public function ActionUserList(int $page = 1)
	{
		$countPage = ceil($this->model->CountUsers() / 20.0);
		$pages = [$countPage, $page];
		$users = $this->model->getUsersPage($page);

		$this->view->Generate('admin/userListView.php', [$pages, $users]);
		return true;
	}

	public function ActionUserEdit(int $id)
	{


		$this->view->Generate("admin/userEditView.php");
		return true;
	}

	public function ActionUserCreate()
	{

		$this->view->Generate("admin/userCreateView.php");
		return true;
	}

	public function ActionUserDelete(int $is)
	{

		header("Location: $_SERVER[HTTP_REFERER]");
		return false;
	}

	#endregion

	#region position

	public function ActionPositionList(int $page = 1)
	{
		$countPage = ceil($this->model->CountPosition() / 20.0);
		$pages = [$countPage, $page];
		$users = $this->model->getPositionsPage($page);

		$this->view->Generate('admin/positionListView.php', [$pages, $users]);
		return true;
	}

	public function ActionPositionEdit(int $id)
	{


		$this->view->Generate("admin/positionEditView.php");
		return true;
	}

	public function ActionPositionCreate()
	{

		$this->view->Generate("admin/positionCreateView.php");
		return true;
	}

	public function ActionPositionDelete(int $is)
	{

		header("Location: $_SERVER[HTTP_REFERER]");
		return false;
	}

	#endregion
	
}
