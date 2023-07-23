<?php

namespace App\Traits;

trait tableSortingTrait{

    public int $perPage = 10;
    public string $sort = 'id|desc';
    public $sortColumnName = 'id';
    public $sortDirection = 'desc';

    public function sortByColumn()
    : bool|string{
        $sort = explode("|", $this->sort);

        if (!$sort[0]){
            return FALSE;
        }

        return $sort[0];
    }

    public function sortDirection()
    : string{
        $sort = explode("|", $this->sort);

        return $sort[1] ?? 'asc';
    }

    public function sortBy($columnName)
    : void{
        if ($this->sortColumnName === $columnName){
            $this->sortDirection = $this->reverseSort();
        }else{
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function reverseSort()
    : string{
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
}
