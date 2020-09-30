<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\CharsheetCharacteristicPivot
 *
 * @property int $id
 * @property int $charsheet_id
 * @property int $characteristic_id
 * @property int $value
 * @property-read \App\Characteristic $characteristic
 * @property-read \App\Charsheet $charsheet
 * @method static \Illuminate\Database\Eloquent\Builder|CharsheetCharacteristicPivot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharsheetCharacteristicPivot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharsheetCharacteristicPivot query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharsheetCharacteristicPivot whereCharacteristicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharsheetCharacteristicPivot whereCharsheetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharsheetCharacteristicPivot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharsheetCharacteristicPivot whereValue($value)
 * @mixin \Eloquent
 */
class CharsheetCharacteristicPivot extends Pivot
{
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function charsheet(): BelongsTo
    {
        return $this->belongsTo(Charsheet::class, 'charsheet_id');
    }

    /**
     * @return BelongsTo
     */
    public function characteristic(): BelongsTo
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id');
    }
}
