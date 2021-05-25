<?php


namespace App\Http\Controllers;


use App\Http\Resources\NewsElementCollection;
use App\Http\Resources\NewsSectionCollection;
use App\Services\NewsElementService;
use Illuminate\Http\Request;


class NewsElementController extends Controller
{
    private NewsElementService $newsElementService;

    public function __construct(NewsElementService $newsElementService)
    {
        $this->newsElementService = $newsElementService;
    }

    /**
     * @param  Request  $request
     *
     * @return NewsElementCollection
     * @throws QueryFilters\Exceptions\QueryFilterException
     */
    public function index(Request $request): NewsElementCollection
    {

        $filter = $request->get('filter', []);
        $paginate = $request->get('page', 1);
        $sort = $request->get('sort', []);

        return new NewsElementCollection(
            $this->newsElementService->get($filter, $paginate, $sort)
        );
    }
}
