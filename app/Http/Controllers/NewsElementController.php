<?php


namespace App\Http\Controllers;


use App\Http\Resources\NewsSectionCollection;
use App\Services\NewsElementService;
use App\Services\NewsSectionService;
use Illuminate\Http\Request;


class NewsElementController extends Controller
{
    private NewsElementService $newsElementService;

    public function __construct(NewsElementService $newsElementService)
    {
        $this->newsElementService = $newsElementService;
    }

    /**
     * @param Request $request
     *
     * @return NewsSectionCollection
     * @throws QueryFilters\Exceptions\QueryFilterException
     */
    public function index(Request $request) : NewsSectionCollection
    {

        $filter   = $request->get('filter', []);
        $paginate = $request->get('paginate', []);
        $sort     = $request->get('sort', []);

        return new NewsSectionCollection(
            $this->newsElementService->get($filter, $paginate, $sort)
        );
    }
}
