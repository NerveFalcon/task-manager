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
        $res = $this->db->query("SELECT tasks.* FROM tasks INNER JOIN workers WHERE workers.id = $_SESSION[id] AND tasks.id = workers.id_task ORDER BY tasks.deadline LIMIT " . ($page - 1)*$showTasks . "," . $showTasks . "");

        return $res->fetch_all(1);
    }
    public function GetCountInTasks()
    {
        $res = $this->db->query("SELECT COUNT(tasks.id) as count FROM tasks INNER JOIN workers WHERE workers.id = $_SESSION[id] AND tasks.id = workers.id_task");

        return $res->fetch_all(1)[0]['count'];
        // $input = array();
        // for ($i=11; $i <= 20; $i++) { 
        //     $input['id_from'] = $i;
        //     $input['title'] = "tittle$i";
        //     $input['text']  = 5*$i;
        //     $input['deadline'] = "2021-11-$i";
        //     $input['file_way'] = "fileWay$i";
        //     $this->Insert("tasks", $input);
        //     // $input[$i]['id_status'] = $i % 5 + 1;
        // }
        for ($i = 1; $i <= 10; $i++)
        {
            $input['email'] = "$i$i$i@gmail.com";
            $input['pass'] = "$i$i$i";
            $input['fio'] = "$i $i" . "ов $i" . "ович";
            $this->Insert("users", $input);
        }
    }
}
