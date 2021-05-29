<?php
class MainModel extends Model
{
    public function __construct() {
        $this->ThisSqlConnect();
    }

    public function GetMessages() {
        $res = $this->db->query("SELECT chat.text, chat.date, users.fio FROM chat INNER JOIN users ON chat.id_user = users.id ORDER BY chat.date DESC");

        return $this->Fetch($res);
    }

    public function AddMessage() {
        $post = $this->GetPost();
        $post['id_user'] = $_SESSION['id'];
        $this->Insert("chat", $post);
    }
}
