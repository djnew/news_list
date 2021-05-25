<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @property int    id
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property int    state
 * @property Carbon active_from
 * @property Carbon activeFrom
 * @property string name
 * @property string code
 * @property mixed  section
 * @property int    show_count
 * @mixin IdeHelperNewsElement
 */
class NewsElement extends Model
{
    use HasFactory;

    protected $casts = [
        'active_from' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::addGlobalScope('activeAndPublish', function (Builder $builder) {
            $builder
                ->where('state', '=', 1)
                ->where('active_from', '<=', Carbon::now())
                ->whereHas('section', function (Builder $query) {
                    $query->with('section')
                        ->where('state', '=', 1)
                        ->where('active_from', '<=', Carbon::now());
                });

        });
    }

    /**
     * Дата публикации
     *
     * @return Carbon
     */
    public function getActiveFrom() : Carbon
    {
        return $this->active_from;
    }

    /**
     * Название категории
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Символьный код категории
     *
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }

    public function getShowCount() : int
    {
        return $this->show_count;
    }

    /**
     * Связь с Секуией
     *
     * @return BelongsTo
     */
    public function section() : BelongsTo
    {
        return $this->belongsTo(NewsSection::class, 'news_section_id');
    }

    /**
     * Получение секции
     *
     * @return NewsSection
     */
    public function getSection() : NewsSection
    {
        return $this->section;
    }

    public function getPreviewText() : string
    {
        return Str::words($this->text, 20, '...');
    }

    public function getRouteKeyName() : string
    {
        return 'code';
    }
}
