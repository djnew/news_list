<?php

namespace App\Http\Controllers\QueryFilters\Base;

use App\Http\Controllers\QueryFilters\Exceptions\QueryFilterException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface iQueryFilter
{
    /**
     * @param string $field
     * @param string $value
     */
    public function orderBy(string $field, string $value) : void;

    /**
     * @param Builder $builder
     *
     * @return BaseQueryFilter
     * @throws QueryFilterException
     */
    public function apply(Builder $builder) : BaseQueryFilter;

    /**
     * @return LengthAwarePaginator|Collection
     */
    public function getResult(): iterable;

    /**
     * @param array $filters
     *
     * @return BaseQueryFilter
     */
    public function setFilters(array $filters) : iQueryFilter;

    /**
     * @param array $paginate
     *
     * @return BaseQueryFilter
     */
    public function setPaginate(array $paginate) : iQueryFilter;

    /**
     * @param array $sort
     *
     * @return BaseQueryFilter
     */
    public function setSort(array $sort) : iQueryFilter;
}
