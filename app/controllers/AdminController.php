<?php
class AdminController extends Controller
{
	public function ActionUserList(int $page = 1)
	{

		$this->view->Generate('admin/userListView.php');
		return true;
	}
	
	public function ActionPositionList(int $page = 1)
	{

		$this->view->Generate('admin/userListView.php');
		return true;
	}
}
