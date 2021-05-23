<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class NewsSection
 *
 * @package App\Models
 * @property int    id
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property int    state
 * @property Carbon active_from
 * @property Carbon activeFrom
 * @property string name
 * @property string code
 * @mixin IdeHelperNewsSection
 */
class NewsSection extends Model
{
    use HasFactory;

    protected $casts = [
        'active_from' => 'datetime',
    ];

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
}
