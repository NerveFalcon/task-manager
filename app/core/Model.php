<?php
class Model
{
	protected $db = null;

	#region static

	/**
	 * Проверка на ajax-запрос
	 * 
	 * @return bool
	 */
	public static function IsAjax(): bool
	{
		if (
			isset($_SERVER['HTTP_X_REQUESTED_WITH'])
			&& !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
			&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
		)
			return true;
		else
			return false;
	}

	/**
	 * Обработчик строки или массива строк
	 * 
	 * @param string|array $input Входная строка
	 * 
	 * @return string|array Обработанные данные
	 */
	public static function InputHandlerRecursive($input)
	{
		if (!is_array($input))
			return self::InputHandler($input);

		foreach ($input as $key => $value)
			$result[self::InputHandler($key)] = self::InputHandlerRecursive($value);
		return $result;
	}

	/**
	 * Обработка строки перед занесением в БД
	 * 
	 * @param string $subject Исходная строка
	 * 
	 * @return string Обработанная строка
	 */
	public static function InputHandler(string $subject): string
	{
		$subject = trim($subject);
		$subject = str_replace('\'', '"', $subject);
		$subject = htmlspecialchars($subject);

		return $subject;
	}

	/**
	 * Добавление/удаление элемента массива
	 * 
	 * @param array $array Исходный массив
	 * @param mixed $toggle Переключаемый элемент
	 * @param mixed $zeroElement Элемент, добавляемый, если удалили последний элемент
	 * @param mixed|null $assocKey Ключ переключаемого элемента
	 * 
	 * @return array Массив с добавленным/удалённым элементом
	 */
	public static function ToggleInArray(array $array, $toggle, $zeroElement, $assocKey = null): array
	{

		if (in_array($toggle, $array))
		{
			$array = array_diff($array, [$toggle]);
			if (count($array) < 1)
			{
				$array[$assocKey] = $zeroElement;
			}
			return $array;
		}
		else
		{
			$array[$assocKey] = $toggle;
			return $array;
		}
	}

	/**
	 * Подключение к БД
	 * 
	 * @return mysqli
	 */
	public static function SqlConnect(): mysqli
	{
		$data = include("static/configs/db.php");
		$sql = new mysqli($data['hostname'], $data['username'], $data['password'], $data['database']);
		$sql->set_charset('utf-8');
		return $sql;
	}

	#endregion

	/**
	 * Подключение БД в $this->db\
	 * Если была подключена, то остаётся предыдущее подключение
	 * 
	 * @return void
	 */
	protected function ThisSqlConnect(): void
	{
		if (is_null($this->db))
		{
			$this->db = $this->SqlConnect();
		}
	}

	/**
	 * Преобразование sql-запроса в массив
	 * 
	 * @param mysqli_result|false $query Результат запроса
	 * 
	 * @return array|false Результат
	 */
	protected function Fetch(mysqli_result $query)
	{
		if ($query != false)
			return $query->fetch_all(1);
		else
			return false;
	}

	/**
	 * Количество записей в таблице
	 * 
	 * @param string $table Название таблицы
	 * @param array|null $where Условие (ассоциативный массив)
	 * 
	 * @return int Количество записей в таблице
	 */
	protected function CountIn(string $table, array $where = null): int
	{
		$this->ThisSqlConnect();
		if (is_null($where))
			return $this->db->query("select count(*) as c from $table")->fetch_all(1)[0]['c'];
		$key = array_keys($where)[0];
		return $this->db->query("select count(*) as c from $table, where $key = '$where[$key]'")->fetch_all(1)[0]['c'];
	}

	/**
	 * Вставка в БД
	 * 
	 * @param string $table Название таблицы
	 * @param array $input Ассоциативный массив входных данных
	 * 
	 * @return int|string иднтификатор последнего вставленного элемента
	 */
	protected function Insert(string $table, array $input)
	{
		$this->ThisSqlConnect();

		foreach ($input as $key => $value)
			if (empty($value))
				unset($input[$key]);

		$keys = implode(", ", array_keys($input));
		$val = "'" . implode("', '", $input) . "'";

		// return "insert into $table($keys) values ($val)";

		$this->db->query("insert into $table($keys) values ($val)");
		return $this->db->insert_id;
	}

	/**
	 * Обновление строки в таблице БД
	 * 
	 * @param string $table Название таблицы
	 * @param array $set Ассоциативный массив обновляемых данных
	 * @param int $id Идентификатор строки
	 * 
	 * @return bool успешность выполненного запроса
	 */
	protected function UpdateOne(string $table, array $set, int $id): bool
	{
		return $this->Update($table, $set, ['id' => $id])[0];
	}

	/**
	 * Обновление данных в таблице БД
	 * 
	 * @param string $table Название таблицы
	 * @param array $set Ассоциативный массив обновляемых данных
	 * @param array|null $where Ассоциативный массив условий
	 * 
	 * @return array массив успешности выполненных запросов
	 */
	protected function Update(string $table, array $set, array $where = null): array
	{
		$this->ThisSqlConnect();
		$result = array();
		if (is_null($where))
		{
			foreach ($set as $key => $value)
			{
				$result[] = $this->db->query("update $table set $key = '$value'");
			}
		}
		else
		{
			$keysWhere = array_keys($where);
			if (count($where) == 1)
			{
				foreach ($set as $key => $value)
				{
					$result[] = $this->db->query("update $table set $key = '$value' where $keysWhere[0] = " . $where[$keysWhere[0]]);
				}
			}
			else
			{
				$i = 0;
				foreach ($set as $key => $value)
				{
					$result[] = $this->db->query("update $table set $key = '$value' where $keysWhere[$i] = " . $where[$keysWhere[$i]]);
					$i++;
				}
			}
		}
		return $result;
	}

	/**
	 * Удаление строки из таблицы
	 * 
	 * @param string $table Название таблицы
	 * @param int $id Идентификатор строки
	 * 
	 * @return bool Статус выполнения
	 */
	protected function Delete(string $table, int $id): bool
	{
		$this->ThisSqlConnect();

		return $this->db->query("delete from $table WHERE id = '$id'");
	}
}
