<?php


namespace App\QueryFilters;


use App\Http\Controllers\QueryFilters\Base\BaseQueryFilter;

class NewsElementQueryFilter extends BaseQueryFilter
{
    public function id($group, $field, $value)
    {
        $this->builder->where($group, '=', $value);
    }

    public function code($group, $field, $value)
    {
        $this->builder->where($group, '=', $value);
    }

    public function idAndCode($group, $field, $value)
    {
        $this->builder->where("CONCAT(`id`, `-`,`code`)", '=', $value);
    }
}
