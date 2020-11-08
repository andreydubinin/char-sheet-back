<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Weapon
 *
 * @property int                 $id
 * @property int                 $charsheet_id
 * @property string|null         $name
 * @property string|null         $distance
 * @property string|null         $speed
 * @property string|null         $damage
 * @property-read \App\Charsheet $charsheet
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereCharsheetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereSpeed($value)
 * @mixin \Eloquent
 */
class Weapon extends Model
{
    public $timestamps = false;

    public $fillable = [
        'name',
        'distance',
        'speed',
        'damage',
    ];

    /**
     * @return BelongsTo
     */
    public function charsheet(): BelongsTo
    {
        return $this->belongsTo(Charsheet::class);
    }
}
