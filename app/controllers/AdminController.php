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
		$links = ["user", "пользователя"];

		$this->view->Generate('admin/listView.php', [$pages, $users, $links]);
		return true;
	}

	public function ActionUserEdit(int $id)
	{
		$user = $this->model->GetUserById($id);

		$this->view->Generate("admin/editView.php", [$user, "пользователя"]);
		return true;
	}

	public function ActionUserCreate()
	{

		$this->view->Generate("admin/userCreateView.php");
		return true;
	}

	public function ActionUserDelete(int $id)
	{
		$this->model->DeleteUser($id);
		header("Location: $_SERVER[HTTP_REFERER]");
		return false;
	}

	#endregion

	#region position

	public function ActionPositionList(int $page = 1)
	{
		$countPage = ceil($this->model->CountPosition() / 20.0);
		$pages = [$countPage, $page];
		$positions = $this->model->getPositionsPage($page);
		$links = ["position", "должность"];

		$this->view->Generate('admin/listView.php', [$pages, $positions, $links]);
		return true;
	}

	public function ActionPositionEdit(int $id)
	{
		$position = $this->model->GetPositionById($id);

		$this->view->Generate("admin/editView.php", [$position, "должности"]);
		return true;
	}

	public function ActionPositionCreate()
	{
		$position = $this->model->GetPositionById(1);

		$this->view->Generate("admin/positionCreateView.php", $position);
		return true;
	}

	public function ActionPositionDelete(int $id)
	{
		$this->model->DeletePosition($id);
		header("Location: $_SERVER[HTTP_REFERER]");
		return false;
	}

	#endregion

}
