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
    public function GetListInTasks(int $page)
    {
        $showTasks = 4;
        $res = $this->db->query("SELECT tasks.*, status.ru as statusRu, status.but_in as butIn, status.but_out as butOut FROM (tasks INNER JOIN workers ON workers.id_user = $_SESSION[id] AND tasks.id = workers.id_task) INNER JOIN status ON status.id = tasks.id_status ORDER BY tasks.deadline LIMIT " . ($page - 1)*$showTasks . "," . $showTasks . "");

        return $this->Fetch($res);
    }
    public function GetCountInTasks()
    {
        $res = $this->db->query("SELECT COUNT(*) as count FROM tasks INNER JOIN workers WHERE workers.id_user = $_SESSION[id] AND tasks.id = workers.id_task");

        // return $res->fetch_all(1)[0]['count'];
        $input = array();
        for ($i=1; $i <= 20; $i++) { 
            // $input['id_from'] = $i;
            // $input['title'] = "tittle$i";
            $input['text']  = str_repeat('texttext ', 100);
            // $input['deadline'] = "2021-11-$i";
            // $input['file_way'] = "fileWay$i";
            $this->UpdateOne("tasks", $input, $i);
            // $input[$i]['id_status'] = $i % 5 + 1;
        }
        // for ($i = 1; $i <= 200; $i++)
        // {
        //     $input['id_task'] = rand(1,21);
        //     $input['id'] = rand(1,22);
        //     $this->Insert("workers", $input);
        // }
    }
    public function GetTask(int $id)
    {
        $res = $this->db->query("SELECT tasks.*, status.ru as status, users.fio as fio FROM (tasks INNER JOIN users ON  tasks.id_from = users.id) INNER JOIN status ON status.id = tasks.id_status AND tasks.id = $id");

        return $this->Fetch($res)[0];
    }

    

}
