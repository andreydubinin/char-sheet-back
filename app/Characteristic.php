<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Characteristic
 *
 * @property int                              $id
 * @property string                           $name
 * @property int|null                         $parent_id
 * @property bool                             $is_default
 * @property int                              $sort
 * @method static Builder|Characteristic newModelQuery()
 * @method static Builder|Characteristic newQuery()
 * @method static Builder|Characteristic query()
 * @method static Builder|Characteristic whereId($value)
 * @method static Builder|Characteristic whereIsDefault($value)
 * @method static Builder|Characteristic whereName($value)
 * @method static Builder|Characteristic whereParentId($value)
 * @method static Builder|Characteristic whereSort($value)
 * @mixin \Eloquent
 * @property-read Collection|Characteristic[] $children
 * @property-read int|null                    $children_count
 * @property-read int                         $value
 * @property int|null                         $charsheet_type
 * @method static Builder|Characteristic whereCharsheetType($value)
 */
class Characteristic extends Model
{
    public $timestamps = false;

    /**
     * @param $value
     *
     * @return int|null
     */
    public function getValueAttribute($value): ?int
    {
        return $value;
    }

    /**
     * @param $value
     */
    public function setValueAttribute($value): void
    {
        $this->attributes['value'] = $value;
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id')->with('children');
    }
}
