<?php

namespace App\models;

use App\models\Connection;
use App\traits\{Create, Delete, Read, Update};

class Model 
{

    use Create, Read, Update, Delete;

    protected $connect;
    protected $table;
    protected $field;
    protected $value;

    public function __construct()
    {
        $this->connect = Connection::connect();
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $all = $this->connect->query($sql);
        $all->execute();

        return $all->fetchAll();
    }

    public function find(string $field, string $value): self
    {
        $this->field = $field;
        $this->value = $value;
        
        return $this;
    }
}