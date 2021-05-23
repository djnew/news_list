<?php


namespace App\Services;


use App\Http\Controllers\QueryFilters\Exceptions\QueryFilterException;
use App\Models\NewsSection;
use App\Repositories\EloquentNewsSectionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NewsSectionService
{
    private EloquentNewsSectionRepository $newsSectionRepository;
    private NewsSection                   $newsSection;

    public function __construct(EloquentNewsSectionRepository $newsSectionRepository, NewsSection $newsSection)
    {
        $this->newsSectionRepository = $newsSectionRepository;
        $this->newsSection           = $newsSection;
    }

    /**
     * @param array $filter
     * @param array $paginate
     * @param array $sort
     *
     * @return LengthAwarePaginator|Collection|iterable
     * @throws QueryFilterException
     */
    public function get(array $filter, array $paginate = [], array $sort = [])
    {
        if(empty($sort)){
            $sort = ['active_from' => 'DESC'];
        }
        return $this->newsSectionRepository->get($filter, $paginate, $sort);
    }

    /**
     * @param int $modelId
     *
     * @return NewsSection
     */
    public function getById(int $modelId) : ?NewsSection
    {
        return $this->newsSectionRepository->firstId($modelId);
    }

    /**
     * @param string $code
     *
     * @return NewsSection|null
     */
    public function getByCode(string $code) : ?NewsSection
    {
        return $this->newsSectionRepository->firstCode($code);
    }


    /**
     * @inheritDoc
     */
    public function make(array $params, NewsSection $model = null) : NewsSection
    {
        $params = Collection::wrap($params);

        /** @var NewsSection $model */
        $model              = $model ?? $this->newsSection;
        $model->name        = $params->get('name');
        $model->active_from = Carbon::now();
        $model->code        = Str::slug($params->get('name'));

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function save(NewsSection $model) : NewsSection
    {
        return $this->newsSectionRepository->save($model);
    }

}
