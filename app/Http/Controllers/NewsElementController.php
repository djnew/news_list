<?php


namespace App\Http\Controllers;


use App\Http\Resources\NewsElementCollection;
use App\Http\Resources\NewsSectionCollection;
use App\Models\NewsElement;
use App\Models\NewsSection;
use App\Services\NewsElementService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;


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
     * @return NewsElementCollection
     * @throws QueryFilters\Exceptions\QueryFilterException
     */
    public function index(Request $request) : NewsElementCollection
    {

        $filter   = $request->get('filter', []);
        $paginate = $request->get('page', 1);
        $sort     = $request->get('sort', []);

        return new NewsElementCollection(
            $this->newsElementService->get($filter, $paginate, $sort)
        );
    }

    public function element(NewsSection $section, NewsElement $element, Request $request)
    {

        if (!$section || !$element) {
            abort(404);
        }

        return view(
            'section',
            [
                'section' => $section,
                "element" => $element,
            ]
        );
    }
}
