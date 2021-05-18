<?php
include "TaskModel.php";
class InTaskModel extends TaskModel
{
    public function GetListInTask()
    {
        $db = $this->SqlConnect();
    }
}
