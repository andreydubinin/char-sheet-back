<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Equipment
 *
 * @property int                 $id
 * @property int                 $charsheet_id
 * @property string|null         $name
 * @property int|null            $quantity
 * @property string|null         $price
 * @property string|null         $weight
 * @property-read \App\Charsheet $charsheet
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCharsheetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereWeight($value)
 * @mixin \Eloquent
 */
class Equipment extends Model
{
    public $timestamps = false;

    public $fillable = [
        'name',
        'quantity',
        'price',
        'weight',
    ];

    /**
     * @return BelongsTo
     */
    public function charsheet(): BelongsTo
    {
        return $this->belongsTo(Charsheet::class);
    }
}
