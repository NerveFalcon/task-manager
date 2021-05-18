<?php
class Model
{
	private $db;

	public function IsAjax()
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

	public static function InputHandler(string $subject)
	{
		$subject = trim($subject);
		$subject = str_replace('\'', '"', $subject);
		$subject = htmlspecialchars($subject);

		return $subject;
	}

	public static function SqlConnect()
	{
		$sql = new mysqli('localhost', 'root', 'root', 'college');
		$sql->set_charset('utf-8');
		return $sql;
	}

	public function Insert(string $table, array $input)
	{
		$this->db = $this->SqlConnect();
		$keys = implode(", ", array_keys($input));
		$val = "'" . implode("', '", $input) . "'";
		// return "insert into $table($keys) values ($val)";
		$this->db->query("insert into $table($keys) values ($val)");
		return $this->db->insert_id;
	}

}
