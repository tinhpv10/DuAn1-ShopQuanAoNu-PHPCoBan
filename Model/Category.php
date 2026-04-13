<?php

class Category
{

    protected $table = 'categories';

    private $_connect;

    public function __construct($connect)
    {
        $this->_connect = $connect;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $sth = $this->_connect->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Đây là phương thức lấy 1 dữ liệu
     * @param int $id
     * 
     * @return array
     * */
    public function getOne(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id=:khoachinh";
        $sth = $this->_connect->prepare($sql);
        $sth->execute(['khoachinh' => $id]);
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
}
