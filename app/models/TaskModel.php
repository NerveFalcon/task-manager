<?php

/**
 * Фильтр, комментирование, получение данных конкретной задачи. Возможно функция смены статуса
 */
class TaskModel extends Model
{

	#region static

	/**
	 * Список всех статусов
	 * 
	 * @return array названий статусов
	 */
	public static function GetAllStatus(): array
	{
		$db = self::SqlConnect();
        $res = $db->query("SELECT * FROM status")->fetch_all(1);

		foreach ($res as $key => $value) {
			$result[$value['en']] = $value;
		}

		return $result;
	}

	public static function GetEnStatus(): array
	{
		$db = self::SqlConnect();
        $res = $db->query("SELECT en FROM status")->fetch_all(1);

		foreach ($res as $key => $value) {
			$result[] = $value['en'];
		}

		return $result;
	}

	/**
	 * Обработка фильтровой части сслыки элемента фильтра
	 * 
	 * @param string $currentStatus Строка с выбранными фильтрами
	 * @param string $stats Переключаемый фильтр
	 * 
	 * @return string часть ссылки
	 */
	public static function FilterSetting(string $status): string
	{
		$url = explode('/', Route::GetURI());
		$currentStatus = $url[count($url) - 2];
		$currentStatus = explode('+', $currentStatus);
		return implode('+', self::ToggleInArray($currentStatus, $status, "await"));
	}

	#endregion

	/**
	 * Изменение статуса
	 * 
	 * @param int $id Идентификатор задачи
	 * @param string $status Название статуса
	 * 
	 * @return bool Статус выполнения
	 */
	public function ChangeStatus(int $id, string $status): bool
	{
		# code...
		return true;
	}

	/**
	 * Добавление комментария к задаче
	 * 
	 * @param int $id Идентификатор задачи
	 * @param string $text текст комментария
	 * 
	 * @return int|string Идентификатор вставленной записи 
	 */
	public function AddComment(int $id, string $text): int
	{
		# code...	// id пользователя брать из $_SESSION['id']
		return $this->Insert("comments", []);
	}
}
