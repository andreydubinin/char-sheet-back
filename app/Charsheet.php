<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Charsheet
 *
 * @property int                                                                 $id
 * @property \Illuminate\Support\Carbon|null                                     $created_at
 * @property \Illuminate\Support\Carbon|null                                     $updated_at
 * @property string                                                              $name
 * @property string                                                              $player_name
 * @property string                                                              $conception
 * @property string                                                              $appearance
 * @property int                                                                 $step
 * @property int                                                                 $defense
 * @property int                                                                 $resistance
 * @property int                                                                 $charisma
 * @property int                                                                 $experience
 * @property int                                                                 $injury
 * @property array                                                               $flaws
 * @property array                                                               $traits
 * @property array                                                               $characteristics
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereAppearance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereCharisma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereConception($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereDefense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereFlaws($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereInjury($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet wherePlayerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereResistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereTraits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Characteristic[] $characteristic
 * @property-read int|null                                                       $characteristic_count
 * @property int                                                                 $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereUserId($value)
 * @property string|null                                                         $slogan
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereSlogan($value)
 * @property-read int|null                                                       $characteristics_count
 * @property int|null                                                            $shield
 * @property int|null                                                            $wounds
 * @property int|null                                                            $fatigue
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereWounds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereFatigue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charsheet whereShield($value)
 */
class Charsheet extends Model
{
    public $fillable = [
        'user_id',
        'name',
        'player_name',
        'conception',
        'appearance',
        'slogan',
        'step',
        'defense',
        'resistance',
        'charisma',
        'experience',
        'injury',
        'flaws',
        'traits',
        'shield',
        'wounds',
        'fatigue',
    ];

    protected $casts = [
        'flaws'           => 'array',
        'traits'          => 'array',
        'injury'          => 'array',
        'characteristics' => 'array',
    ];

    /**
     * @return BelongsToMany
     */
    public function characteristics(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                Characteristic::class,
                'charsheet_characteristic_pivot',
                'charsheet_id',
                'characteristic_id'
            )
            ->withPivot(['value']);
    }
}
