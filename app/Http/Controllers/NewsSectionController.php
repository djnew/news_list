<?php


namespace App\Http\Controllers;


use App\Http\Resources\NewsSectionCollection;
use App\Services\NewsSectionService;
use Illuminate\Http\Request;


class NewsSectionController extends Controller
{
    private NewsSectionService $newsSectionService;

    public function __construct(NewsSectionService $newsSectionService)
    {
        $this->newsSectionService = $newsSectionService;
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
            $this->newsSectionService->get($filter, $paginate, $sort)
        );
    }
}
