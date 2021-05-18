<?php
include "TaskModel.php";
class InTaskModel extends TaskModel
{
    /**
     * Функция получения списка входязих задач
     * @param int $page текщая страница
     *
     * @return array Масив задач
     */
    public function GetListInTask(int $page)
    {
        $db = $this->SqlConnect();
        return $db;
    }
}
