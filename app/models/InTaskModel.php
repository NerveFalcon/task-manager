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
        $res = $this->db->query("SELECT tasks.*, status.en as status FROM (tasks INNER JOIN workers ON workers.id_user = $_SESSION[id] AND tasks.id = workers.id_task) INNER JOIN status ON status.id = tasks.id_status ORDER BY tasks.deadline LIMIT " . ($page - 1)*$showTasks . "," . $showTasks . "");

        return $this->Fetch($res);
    }
    public function GetCountInTasks()
    {
        $res = $this->db->query("SELECT COUNT(*) as count FROM tasks INNER JOIN workers WHERE workers.id_user = $_SESSION[id] AND tasks.id = workers.id_task");

        return $res->fetch_all(1)[0]['count'];
        $input = array();
        // for ($i=11; $i <= 20; $i++) { 
        //     $input['id_from'] = $i;
        //     $input['title'] = "tittle$i";
        //     $input['text']  = 5*$i;
        //     $input['deadline'] = "2021-11-$i";
        //     $input['file_way'] = "fileWay$i";
        //     $this->Insert("tasks", $input);
        //     // $input[$i]['id_status'] = $i % 5 + 1;
        // }
        for ($i = 1; $i <= 200; $i++)
        {
            $input['id_task'] = rand(1,21);
            $input['id'] = rand(1,22);
            $this->Insert("workers", $input);
        }
    }
    public function GetTask(int $id)
    {
        $res = $this->db->query("SELECT tasks.*, status.ru as status, users.fio as fio FROM (tasks INNER JOIN users ON  tasks.id_from = users.id) INNER JOIN status ON status.id = tasks.id_status AND tasks.id = $id");

        return $this->Fetch($res)[0];
    }

    public function GetComment(int $id)
    {
        $res = $this->db->query("SELECT comments.text as text, comments.date as date, users.fio as fio FROM comments INNER JOIN users ON comments.id_from = users.id AND commets.id_task = $id ORDER BY comments.date");

        return $this->Fetch($res);
    }

}
