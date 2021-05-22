<?php
namespace App\Repositories;

use App\Http\Controllers\QueryFilters\Exceptions\QueryFilterException;
use App\Models\NewsElement;
use App\Models\NewsSection;
use App\QueryFilters\NewsSectionQueryFilter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentNewsElementRepository {
    /**
     * @var NewsElement|Model
     */
    private $model;
    private NewsSectionQueryFilter $queryFilter;

    /**
     * EloquentNewsElementRepository constructor.
     *
     * @param NewsElement            $model
     * @param NewsSectionQueryFilter $queryFilter
     */
    public function __construct(NewsElement $model, NewsSectionQueryFilter $queryFilter)
    {
        $this->model       = $model;
        $this->queryFilter = $queryFilter;
    }


    /**
     * @param array $filter - фильтр
     * @param array $paginate - постраничная навигация
     * @param array $sort - сортировка
     *
     * @return LengthAwarePaginator|Collection|iterable
     * @throws QueryFilterException
     */
    public function get(array $filter, array $paginate, array $sort)
    {
        return $this->queryFilter
            ->setFilters($filter)
            ->setPaginate($paginate)
            ->setSort($sort)
            ->apply($this->model::query())
            ->getResult();
    }

    /**
     * @param string $elementUrl
     *
     * @return NewsElement
     */
    public function first(string $elementUrl) : NewsElement
    {
        return $this->model::where("CONCAT(`id`, `-`,`code`)", '=', $elementUrl)->first();
    }

    /**
     * @param int $modelId - ид категории
     *
     * @return NewsElement
     */
    public function firstId(int $modelId) : NewsElement
    {
        return $this->model::where('id', $modelId)->first();
    }

    /**
     * @param string $modelCode - код категории
     *
     * @return NewsElement
     */
    public function firstCode(string $modelCode) : NewsElement
    {
        $model = $this->model::where('code', $modelCode)->firstOrFail();
        $model->increment('show_count');
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
     * @param NewsElement $model - модель
     *
     * @return NewsElement
     */
    public function save(NewsElement $model) : NewsElement
    {
        $model->save();

        return $model;
    }
}
