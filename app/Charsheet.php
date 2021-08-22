<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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
 * @method static Builder|Charsheet newModelQuery()
 * @method static Builder|Charsheet newQuery()
 * @method static Builder|Charsheet query()
 * @method static Builder|Charsheet whereAppearance($value)
 * @method static Builder|Charsheet whereCharacteristics($value)
 * @method static Builder|Charsheet whereCharisma($value)
 * @method static Builder|Charsheet whereConception($value)
 * @method static Builder|Charsheet whereCreatedAt($value)
 * @method static Builder|Charsheet whereDefense($value)
 * @method static Builder|Charsheet whereExperience($value)
 * @method static Builder|Charsheet whereFlaws($value)
 * @method static Builder|Charsheet whereId($value)
 * @method static Builder|Charsheet whereInjury($value)
 * @method static Builder|Charsheet whereName($value)
 * @method static Builder|Charsheet wherePlayerName($value)
 * @method static Builder|Charsheet whereResistance($value)
 * @method static Builder|Charsheet whereStep($value)
 * @method static Builder|Charsheet whereTraits($value)
 * @method static Builder|Charsheet whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Characteristic[] $characteristic
 * @property-read int|null                                                       $characteristic_count
 * @property int                                                                 $user_id
 * @method static Builder|Charsheet whereUserId($value)
 * @property string|null                                                         $slogan
 * @method static Builder|Charsheet whereSlogan($value)
 * @property-read int|null                                                       $characteristics_count
 * @property int|null                                                            $shield
 * @property int|null                                                            $wounds
 * @property int|null                                                            $fatigue
 * @method static Builder|Charsheet whereWounds($value)
 * @method static Builder|Charsheet whereFatigue($value)
 * @method static Builder|Charsheet whereShield($value)
 * @property int|null                                                            $type
 * @method static Builder|Charsheet whereType($value)
 */
class Charsheet extends Model
{
    public const TYPE_SAVAGE_WORLD = 1;
    public const TYPE_CUSTOM       = 2;
    public const TYPE_CYBERPUNK    = 3;

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
            ->withPivot(['value'])
            ->orderBy('sort', 'ASC')
            ->orderBy('id', 'ASC');
    }
}
