<?php
class AuthModel extends Model
{
	public function Validation(string $email, string $password)
	{
		$this->ThisSqlConnect();

		$query = $this->db->query("select count(*) as c from users where email='$email' and pass='$password'");
		$fetch = $this->Fetch($query);
		if (is_array($fetch))
			return $fetch[0]['c'] > 0;
		else
			return $fetch;
	}

	public function GetUser(string $email)
	{
		$this->ThisSqlConnect();

		$query = $this->db->query("select * from users where email='$email'");
		return $this->Fetch($query)[0];
	}

	public function generateCode($length = 6)
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ 0123456789!@#$&";
		$code = "";
		$clen = strlen($chars) - 1;
		while (strlen($code) < $length)
		{
			$code .= $chars[mt_rand(0, $clen)];
		}
		return $code;
	}
}
