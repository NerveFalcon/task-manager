<?php
include "TaskModel.php";
class InTaskModel extends TaskModel
{
    public function __construct()
    {
        $this->db = self::SqlConnect();
    }
    /**
     * Функция получения списка входязих задач
     * @param int $page текщая страница
     *
     * @return array Масив задач
     */
    public function GetListInTasks(int $page, $filter, $showTasks = 4)
    {
        $this->ThisSqlConnect();
        $filter = "'" . str_replace('+', '\', \'', $filter) . "'";
        $res = $this->db->query("SELECT tasks.*, status.ru as status, status.but_in as butIn, status.but_out as butOut FROM (tasks INNER JOIN workers ON workers.id_user = $_SESSION[id] AND tasks.id = workers.id_task) INNER JOIN status ON status.id = tasks.id_status AND status.en IN ($filter) ORDER BY tasks.deadline LIMIT " . ($page - 1)*$showTasks . "," . $showTasks . "");

        return $this->Fetch($res);
    }
    public function GetCountInTasks($filter)
    {
        $filter = "'" . str_replace('+', '\', \'', $filter) . "'";

        $res = $this->db->query("SELECT COUNT(*) as count FROM (tasks INNER JOIN workers ON workers.id_user = $_SESSION[id] AND tasks.id = workers.id_task) INNER JOIN status ON tasks.id_status = status.id AND status.en IN ($filter)");

        return $this->Fetch($res)[0]['count'];
        // $input = array();
        // for ($i=1; $i <= 20; $i++) {
        //     // $input['id_from'] = $i;
        //     // $input['title'] = "tittle$i";
        //     // $input['text']  = str_repeat('texttext ', 100);
        //     // $input['deadline'] = "2021-11-$i";
        //     // $input['file_way'] = "fileWay$i";
        //     $input['id_status'] = rand(1, 5);

        //     $this->UpdateOne("tasks", $input, $i);
        // }
        // for ($i = 1; $i <= 200; $i++)
        // {
        //     $input['id_task'] = rand(1,21);
        //     $input['id'] = rand(1,22);
        //     $this->Insert("workers", $input);
        // }
    }
    public function GetTask(int $id)
    {
        $res = $this->db->query("SELECT tasks.*, status.ru as status, status.but_in as butIn, status.but_out as butOut, users.fio as fio FROM (tasks INNER JOIN users ON  tasks.id_from = users.id) INNER JOIN status ON status.id = tasks.id_status AND tasks.id = $id");

        return $this->Fetch($res)[0];
    }

}
