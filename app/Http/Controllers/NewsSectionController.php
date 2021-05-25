<?php


namespace App\Http\Controllers;


use App\Http\Resources\NewsElementCollection;
use App\Http\Resources\NewsSectionCollection;
use App\Http\Resources\NewsSectionElementsResource;
use App\Models\NewsSection;
use App\Services\NewsElementService;
use App\Services\NewsSectionService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class NewsSectionController extends Controller
{
    private NewsSectionService $newsSectionService;
    private NewsElementService $newsElementService;

    public function __construct(NewsSectionService $newsSectionService, NewsElementService $newsElementService)
    {
        $this->newsSectionService = $newsSectionService;
        $this->newsElementService = $newsElementService;
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
        $paginate = $request->get('page', 1);
        $sort     = $request->get('sort', []);
        $sections = new NewsSectionCollection(
            $this->newsSectionService->get($filter, $paginate, $sort)
        );

        return view(
            'sections',
            [
                "sectionsResource" => $sections->response($request)->getData(),
            ]
        );
    }

    public function section(NewsSection $section, Request $request)
    {
        $filter   = $request->get('filter', [
            'news_section_id' => $section['id'],
        ]);
        $paginate = $request->get('page', 1);
        $sort     = $request->get('sort', []);

        $elements = new NewsElementCollection(
            $this->newsElementService->get($filter, $paginate, $sort)
        );
        if (!$section) {
            abort(404);
        }

        return view(
            'section',
            [
                'section'          => $section,
                "elementsResource" => $elements->response([])->getData(),
            ]
        );
    }
}
