<?php
class Model
{
	private $db = null;

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
	public static function ToggleInArray(array $array, mixed $toggle, mixed $zeroElement, mixed $assocKey = null): array
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
	 * Вставка в БД
	 * 
	 * @param string $table Название таблицы
	 * @param array $input Ассоциативный массив входных данных
	 * 
	 * @return int|string иднтификатор последнего вставленного элемента
	 */
	protected function Insert(string $table, array $input): int|string
	{
		$this->ThisSqlConnect();

		$keys = implode(", ", array_keys($input));
		$val = "'" . implode("', '", $input) . "'";
		
		//return "insert into $table($keys) values ($val)";
		
		$this->db->query("insert into $table($keys) values ($val)");
		return $this->db->insert_id;
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
}
