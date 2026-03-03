<?php
require ROOT . "/DB.php";

class News
{
    public function getTotal()
    {
        $sql = "
            SELECT count(*) total
            FROM news
        ";
        
        $db = DB::getConnection();
        $rs = $db->query($sql);

        $row = $rs->fetch();
        
        return $row['total'];
    }

    public function getList($limit, $offset)
    {
        $sql = "
            SELECT *,
            DATE_FORMAT(`date`, '%d.%m.%Y') fmt
            FROM news
            ORDER BY `date` DESC
            LIMIT :limit OFFSET :offset
        ";
        
        $db = DB::getConnection();
        $rs = $db->prepare($sql);
        $rs->bindValue(":limit", $limit, PDO::PARAM_INT);
        $rs->bindValue(":offset", $offset, PDO::PARAM_INT);
        $rs->execute();

        return $rs->fetchAll();
    }

    public function findById($id)
    {
        $sql = "
            SELECT *,
            DATE_FORMAT(`date`, '%d.%m.%Y') fmt
            FROM news
            WHERE id = :id
        ";

        $db = DB::getConnection();
        $rs = $db->prepare($sql);
        $rs->bindValue(":id", $id, PDO::PARAM_INT);
        $rs->execute();

        return $rs->fetch();
    }

    public function getLastOne()
    {
        $sql = "
            SELECT *,
            DATE_FORMAT(`date`, '%d.%m.%Y') fmt
            FROM news
            ORDER BY `date` DESC
            LIMIT 1
        ";

        $db = DB::getConnection();
        $rs = $db->query($sql);
        
        return $rs->fetch();
    }
}
