<?php


namespace App\Http\Controllers;


use App\Http\Resources\NewsSectionCollection;
use App\Models\NewsSection;
use App\Services\NewsSectionService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;


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
     * @return Application|Factory|View
     * @throws QueryFilters\Exceptions\QueryFilterException
     */
    public function index(Request $request)
    {

        $filter   = $request->get('filter', []);
        $paginate = $request->get('paginate', []);
        $sort     = $request->get('sort', []);
        return view(
            'home',
            $this->newsSectionService->get($filter, $paginate, $sort)
        );
    }

    public function section(NewsSection $newsSection){
        
    }
}
