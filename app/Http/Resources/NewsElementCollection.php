<?php


namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsElementCollection extends ResourceCollection
{
    public $collects = NewsElementResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data'    => $this->collection,
            'success' => true,
        ];
    }
}
