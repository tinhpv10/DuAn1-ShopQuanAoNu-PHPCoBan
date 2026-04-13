<?php

class Product
{

    protected $table = 'sTQ_defaultoptions';

    private $_connect;

    public function __construct($connect)
    {
        $this->_connect = $connect;
    }

    public function getAll($autoload = 'on')
    {
        $sql = "SELECT * FROM $this->table  WHERE `autoload` = :autoload";
        $sth = $this->_connect->prepare($sql);
        $sth->execute(['autoload' => $autoload]);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
