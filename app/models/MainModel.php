<?php
class MainModel extends Model 
{
    public function __construct() {
        $this->ThisSqlConnect();
    }

    public function GetMessages() {
        $res = $this->db->query("SELECT chat.text, chat.date, users.fio FROM chat INNER JOIN users ON chat.id_user = users.id ORDER BY chat.date");

        // $messages = array();
		// for ($i = 1; $i <= 5; $i++)
		// {
        //     $messages['id_user'] = $i;
        //     $messages['text'] = str_repeat("text ", 50);

        //     echo $this->Insert("chat", $messages);
		// }


        return $this->Fetch($res);
    }
}
