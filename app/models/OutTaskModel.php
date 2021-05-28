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
}
