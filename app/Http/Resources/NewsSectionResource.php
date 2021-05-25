<?php


namespace App\Http\Resources;


use App\Models\NewsSection;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsSectionResource extends JsonResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request) : array
    {
        /** @var NewsSection $model */
        $model = $this;

        return [
            'id'         => $model->id,
            'activeFrom' => $model->getActiveFrom()->format('d.m.Y H:i'),
            'name'       => $model->getName(),
            'code'       => $model->getCode(),
            'news_element_count' => $model->getNewsElementCount()
        ];
    }
}
