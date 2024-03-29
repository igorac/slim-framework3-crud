<?php

namespace App\traits;

use Exception;

trait Read
{
    
    private $sql;
    private $binds;

    public function select($fields = '*'): self
    {
        $this->sql = "SELECT {$fields} FROM {$this->table}";
        return $this;
    }

    public function where(): self
    {
        $num_args = func_num_args();
        $args     = func_get_args();

        $args = $this->whereArgs($num_args, $args);

        $this->sql .= " WHERE {$args['field']} {$args['operator']} :{$args['field']}";
        $this->binds = [
            $args['field'] => $args['value'],
        ];
        
        return $this;
    }

    private function whereArgs(int $num_args, array $args): array
    {
        if ($num_args < 2) {
            throw new \Exception("Opa, algo errado aconteceu, o where precisa de no mínimo 2 argumentos");
        }

        if ($num_args === 2) {
            $field = $args[0];
            $operator = '=';
            $value = $args[1];
        }

        if ($num_args === 3) {
            $field = $args[0];
            $operator = $args[1];
            $value = $args[2];
        }

        if ($num_args > 3) {
            throw new \Exception("Opa, algo errado aconteceu, o where não pode ter mais do que 3 argumentos");
        }

        return [
            'field' => $field,
            'operator' => $operator,
            'value' => $value
        ];
    }

    public function get()
    {
        $select = $this->bindAndExecute();
        return $select->fetchAll();
    }

    public function first()
    {
        $select = $this->bindAndExecute();
        return $select->fetch();
    }

    private function bindAndExecute()
    {
        $select = $this->connect->prepare($this->sql);
        $select->execute($this->binds);

        return $select;
    }

}