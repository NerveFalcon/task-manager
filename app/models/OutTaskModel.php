<?php
include "TaskModel.php";
class OutTaskModel extends TaskModel
{

    public function getCountTasks()
    {
        $this->ThisSqlConnect();

        $result = $this->db->query("SELECT COUNT(*) as count FROM tasks INNER JOIN workers WHERE workers.id_user = $_SESSION[id] AND tasks.id = workers.id_task");

        return $this->Fetch($result);
    }
    public function GetWorkers()
    {
        $this->ThisSqlConnect();
        $workers_id = $this->db->query("select id_sub as id from `rank` where id_head = '$_SESSION[id]'");
        $workers_id = $this->Fetch($workers_id);
        $ids = [];
        foreach ($workers_id as $key => $value) {
            $ids[$key] = $value['id'];
        }
        $workers_id = implode(', ', $ids);
        $workers = $this->db->query("select * from users where id in ($workers_id)");
        $ids = $this->Fetch($workers);
        return $ids;
    }
}
