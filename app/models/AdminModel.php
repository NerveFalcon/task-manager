<?php
class AdminModel extends Model
{

	#region users

	/**
	 * Количество пользователей
	 * 
	 * @return int
	 */
	public function CountUsers(): int
	{
		$this->ThisSqlConnect();

		$query = $this->db->query("select count(*) as c from users");

		return $query->fetch_all(1)[0]['c'];
	}

	/**
	 * Получение страницы пользователей
	 * 
	 * @param int $page Номер страницы
	 * 
	 * @return array Данные пользователей
	 */
	public function getUsersPage(int $page): array
	{
		$this->ThisSqlConnect();

		$indent = --$page * 20;

		$query = $this->db->query("select * from users limit $indent, 20 ");
		return $query->fetch_all(1);
	}

	public function GetUserById(int $id)
	{
		$this->ThisSqlConnect();

		$query = $this->db->query("select * from users where id = '$id'");

		return $this->Fetch($query)[0];
	}

	/**
	 * Удаление пользователя
	 * 
	 * @param int $id идентификатор пользователя
	 * 
	 * @return bool Статус выполнения
	 */
	public function DeleteUser(int $id): bool
	{
		return $this->Delete("users", $id);
	}

	#endregion

	#region Position

	/**
	 * Количество должностей
	 * 
	 * @return int
	 */
	public function CountPosition(): int
	{
		$this->ThisSqlConnect();

		$query = $this->db->query("select count(*) as c from posts");

		return $query->fetch_all(1)[0]['c'];
	}

	/**
	 * Получение страницы должностей
	 * 
	 * @param int $page Номер страницы
	 * 
	 * @return array Данные пользователей
	 */
	public function getPositionsPage(int $page): array
	{
		$this->ThisSqlConnect();

		$indent = --$page * 20;

		$query = $this->db->query("select * from posts limit $indent, 20 ");
		return $query->fetch_all(1);
	}

	public function GetPositionById(int $id)
	{
		$this->ThisSqlConnect();

		$query = $this->db->query("select * from posts where id = '$id'");

		return $this->Fetch($query)[0];
	}

	public function DeletePosition(int $id)
	{
		$this->Delete("posts", $id);
	}

	#endregion
}
