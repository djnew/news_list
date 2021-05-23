<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\NewsElement
 *
 * @property int    id
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property int    state
 * @property Carbon active_from
 * @property Carbon activeFrom
 * @property string name
 * @property string code
 * @property mixed section
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $state
 * @property Carbon $active_from
 * @property string $name
 * @property string $code
 * @property string|null $text
 * @property int $show_count
 * @property int|null $news_section_id
 * @property-read \App\Models\NewsSection|null $section
 * @method static \Database\Factories\NewsElementFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement whereActiveFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement whereNewsSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement whereShowCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsElement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperNewsElement extends \Eloquent {}
}

namespace App\Models{
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
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $state
 * @property Carbon $active_from
 * @property string $name
 * @property string $code
 * @method static \Database\Factories\NewsSectionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSection whereActiveFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSection whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSection whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSection whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperNewsSection extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser extends \Eloquent {}
}

