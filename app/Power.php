<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Power
 *
 * @package App
 * @property int                 $id
 * @property int                 $charsheet_id
 * @property string|null         $name
 * @property string|null         $price
 * @property string|null         $distance
 * @property string|null         $effect
 * @property string|null         $duration
 * @property-read \App\Charsheet $charsheet
 * @method static \Illuminate\Database\Eloquent\Builder|Power newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Power newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Power query()
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereCharsheetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereEffect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power wherePrice($value)
 * @mixin \Eloquent
 */
class Power extends Model
{
    public $timestamps = false;

    public $fillable = [
        'name',
        'price',
        'distance',
        'effect',
        'duration',
    ];

    /**
     * @return BelongsTo
     */
    public function charsheet(): BelongsTo
    {
        return $this->belongsTo(Charsheet::class);
    }
}
