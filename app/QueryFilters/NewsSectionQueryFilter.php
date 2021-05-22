<?php


namespace App\QueryFilters;


use App\Http\Controllers\QueryFilters\Base\BaseQueryFilter;

class NewsSectionQueryFilter extends BaseQueryFilter
{
    public function id($group, $field, $value){
        $this->builder-where($group, '=', $value);
    }

    public function code($group, $field, $value){
        $this->builder-where($group, '=', $value);
    }

}
