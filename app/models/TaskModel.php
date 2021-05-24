<?php

/**
 * Фильтр, комментирование, получение данных конкретной задачи. Возможно функция смены статуса
 */
class TaskModel extends Model
{
	/**
	 * Список всех статусов
	 * 
	 * @return array названий статусов
	 */
	public static function GetAllStatus(): array
	{
		return array(
			"await",
			"performed",
			"verified",
			"done",
			"draft"
		);
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

	/**
	 * Получение русского наименования статуса
	 * 
	 * @param string $status Английское наименование
	 * 
	 * @return string Русское наименование
	 */
	public function GetRuStatus(string $status): string
	{
		# code...
		return $status;
	}

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
	public function AddComment(int $id, string $text): int|string
	{
		# code...	// id пользователя брать из $_SESSION['id']
		return $this->Insert("comments", []);
	}
}
