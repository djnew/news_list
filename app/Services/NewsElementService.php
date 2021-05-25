<?php


namespace App\Services;


use App\Http\Controllers\QueryFilters\Exceptions\QueryFilterException;
use App\Models\NewsElement;
use App\Models\NewsSection;
use App\Repositories\EloquentNewsElementRepository;
use App\Repositories\EloquentNewsSectionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NewsElementService
{
    private EloquentNewsElementRepository $newsElementRepository;
    private NewsElement                   $newsElement;

    public function __construct(EloquentNewsElementRepository $newsElementRepository, NewsElement $newsElement)
    {
        $this->newsElementRepository = $newsElementRepository;
        $this->newsElement           = $newsElement;
    }

    /**
     * @param array $filter
     * @param array $paginate
     * @param array $sort
     *
     * @return LengthAwarePaginator|Collection|iterable
     * @throws QueryFilterException
     */
    public function get(array $filter, int $paginate = 1, array $sort = [])
    {
        return $this->newsElementRepository->get($filter, $paginate, $sort);
    }

    /**
     * @param int $modelId
     *
     * @return NewsSection
     */
    public function getByIdAndCode(int $modelId) : ?NewsElement
    {
        return $this->newsElementRepository->first($modelId);
    }

    /**
     * @param array            $params
     * @param NewsElement|null $model
     *
     * @return NewsElement
     */
    public function make(array $params, NewsElement $model = null) : NewsElement
    {
        $params = Collection::wrap($params);

        /** @var NewsElement $model */
        $model              = $model ?? $this->newsElement;
        $model->name        = $params->get('name');
        $model->active_from = Carbon::now();
        $model->code        = Str::slug($params->get('code'));

        return $model;
    }

    /**
     * @param NewsElement $model
     *
     * @return NewsElement
     */
    public function save(NewsElement $model) : NewsElement
    {
        return $this->newsElementRepository->save($model);
    }

}
