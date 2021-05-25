<?php
namespace App\Repositories;

use App\Http\Controllers\QueryFilters\Exceptions\QueryFilterException;
use App\Models\NewsSection;
use App\QueryFilters\NewsSectionQueryFilter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentNewsSectionRepository {
    /**
     * @var NewsSection|Model
     */
    private $model;
    private NewsSectionQueryFilter $queryFilter;

    public function __construct(NewsSection $model, NewsSectionQueryFilter $queryFilter)
    {
        $this->model       = $model;
        $this->queryFilter = $queryFilter;
    }


    /**
     * @param array $filter - фильтр
     * @param int $paginate - постраничная навигация
     * @param array $sort - сортировка
     *
     * @return LengthAwarePaginator|Collection|iterable
     * @throws QueryFilterException
     */
    public function get(array $filter, int $paginate, array $sort)
    {
        return $this->queryFilter
            ->setFilters($filter)
            ->setPaginate($paginate)
            ->setSort($sort)
            ->apply($this->model::query()->withCount('newsElement'))
            ->getResult();
    }

    /**
     * @param int $modelId - ид категории
     *
     * @return NewsSection
     */
    public function firstId(int $modelId) : NewsSection
    {
        return $this->model::where('id', $modelId)->first();
    }

    /**
     * @param string $modelCode - код категории
     *
     * @return NewsSection
     */
    public function firstCode(string $modelCode) : NewsSection
    {
        $model = $this->model::where('code', $modelCode)->with('newsElement')->firstOrFail();
//        $model->increment('show_count');
        return $model;
    }

    /**
     * @param int $modelId - ид категории
     *
     * @return bool|null
     */
    public function delete(int $modelId) : ?bool
    {
        return $this->model::where('id', $modelId)->delete();
    }

    /**
     * @param NewsSection $model
     *
     * @return NewsSection
     */
    public function save(NewsSection $model) : NewsSection
    {
        $model->save();

        return $model;
    }
}
