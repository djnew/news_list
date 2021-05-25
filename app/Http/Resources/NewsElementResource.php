<?php


namespace App\Http\Resources;

use App\Models\NewsElement;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsElementResource extends JsonResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request) : array
    {
        /** @var NewsElement $model */
        $model = $this;

        return [
            'id'         => $model->id,
            'activeFrom' => $model->getActiveFrom()->format('d.m.Y H:i'),
            'name'       => $model->getName(),
            'code'       => $model->getCode(),
            'show_count' => $model->getShowCount(),
            'text'       => $model->getPreviewText(),
        ];
    }
}
