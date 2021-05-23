<?php

namespace App\Http\Controllers\QueryFilters\Base;

use App\Http\Controllers\QueryFilters\Exceptions\QueryFilterException;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as BuilderQuery;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Str;

abstract class BaseQueryFilter implements iQueryFilter
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Builder|BuilderQuery
     */
    protected $builder;

    /**
     * @var array
     */
    protected $filters = null;
    /**
     * @var array
     */
    protected $paginate = null;
    /**
     * @var array
     */
    protected $sort = null;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     *
     * @return BaseQueryFilter
     * @throws QueryFilterException
     */
    public function apply(Builder $builder) : BaseQueryFilter
    {
        $this->builder = $builder;

        $this->buildFilter();

        $this->buildSort();

        return $this;
    }

    /**
     * @param BuilderQuery $builder
     *
     * @return BaseQueryFilter
     * @throws QueryFilterException
     */
    public function applyDB(BuilderQuery $builder) : BaseQueryFilter
    {
        $this->builder = $builder;

        $this->buildFilter();

        $this->buildSort();

        return $this;
    }

    /**
     * @return LengthAwarePaginator|Collection
     */
    public function getResult() : iterable
    {
        if ($this->isPaginate()) {

            $paginateParams = $this->getPaginate();

            return $this->builder->paginate(
                $paginateParams['perPage'] ?? 10,
                ['*'],
                'page',
                $paginateParams['page'] ?? 1
            );

        } else {
            return $this->builder->get();
        }
    }

    /**
     * @throws QueryFilterException
     */
    private function buildFilter() : void
    {
        foreach ($this->getFilters() as $field => $values) {

            $method = Str::camel($field);

            if (method_exists($this, $method)) {
                if (is_array($values)) {
                    try {
                        call_user_func_array([$this, $method], [$field, '', $values]);
                    } catch (Exception $exception) {
                        throw new QueryFilterException($exception->getMessage());
                    }
                } else {
                    foreach ((array)$values as $key => $value) {
                        try {
                            call_user_func_array([$this, $method], [$field, $key, $value]);
                        } catch (Exception $exception) {
                            throw new QueryFilterException($exception->getMessage());
                        }
                    }
                }
            }
        }
    }

    /**
     * @return bool
     */
    private function isPaginate() : bool
    {

        return true;
    }

    private function buildSort() : void
    {
        if (empty($this->getSort())) {
            return;
        }

        foreach ($this->getSort() as $field => $value) {
            call_user_func_array([$this, 'orderBy'], [$field, $value]);
        }
    }

    /**
     * @param string $field
     * @param string $value
     */
    public function orderBy(string $field, string $value) : void
    {
        $this->builder->orderBy($field, $value);
    }


    /**
     * @return array
     */
    protected function getFilters() : ?array
    {
        return array_filter($this->filters ?? $this->request->get('filters', []));
    }

    /**
     * @param array $filters
     *
     * @return BaseQueryFilter
     */
    public function setFilters(array $filters) : iQueryFilter
    {
        $this->filters = $filters;

        return $this;
    }


    /**
     * @return array
     */
    private function getPaginate() : ?array
    {
        return array_filter($this->paginate ?? $this->request->get('paginate', []));
    }

    /**
     * @param array $paginate
     *
     * @return BaseQueryFilter
     */
    public function setPaginate(array $paginate) : iQueryFilter
    {
        $this->paginate = $paginate;

        return $this;
    }

    /**
     * @return array
     */
    public function getSort() : ?array
    {
        return array_filter($this->sort ?? $this->request->get('sort', []));
    }

    /**
     * @param array $sort
     *
     * @return BaseQueryFilter
     */
    public function setSort(array $sort) : iQueryFilter
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @return Builder
     */
    public function getBuilder() : Builder
    {
        return $this->builder;
    }

}
