<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\CKName
 *
 * @property int $id
 * @property int $idol_id
 * @property string|null $name_zh
 * @property string|null $name_ko
 * @property int|null $name_zh_separate
 * @property int|null $name_ko_separate
 * @property string|null $subname_zh
 * @property string|null $subname_ko
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CKName newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CKName newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CKName query()
 * @method static \Illuminate\Database\Eloquent\Builder|CKName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CKName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CKName whereIdolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CKName whereNameKo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CKName whereNameKoSeparate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CKName whereNameZh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CKName whereNameZhSeparate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CKName whereSubnameKo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CKName whereSubnameZh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CKName whereUpdatedAt($value)
 */
	class CKName extends \Eloquent {}
}

namespace App{
/**
 * App\Idol
 *
 * @property int $id
 * @property string $name
 * @property string $name_y
 * @property string $name_r
 * @property string|null $subname
 * @property int|null $name_separate
 * @property int|null $name_y_separate
 * @property int|null $name_r_separate
 * @property string|null $type
 * @property string|null $birthdate
 * @property int|null $age
 * @property int|null $height
 * @property float|null $weight
 * @property string|null $bloodtype
 * @property string|null $handedness
 * @property int|null $bust
 * @property int|null $waist
 * @property int|null $hip
 * @property string|null $birthplace
 * @property string|null $hobby
 * @property string|null $skill
 * @property string|null $favorite
 * @property string|null $cv
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $greemas_type
 * @method static \Illuminate\Database\Eloquent\Builder|Idol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Idol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Idol query()
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereBirthplace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereBloodtype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereBust($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereFavorite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereGreemasType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereHandedness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereHip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereHobby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereNameR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereNameRSeparate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereNameSeparate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereNameY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereNameYSeparate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereSkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereSubname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereWaist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereWeight($value)
 */
	class Idol extends \Eloquent {}
}

namespace App{
/**
 * App\User
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
 */
	class User extends \Eloquent {}
}

