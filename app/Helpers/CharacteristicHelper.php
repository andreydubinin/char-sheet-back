<?php

namespace App\Helpers;

use App\Characteristic;
use App\Charsheet;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CharacteristicHelper
 * @package App\Helpers
 */
class CharacteristicHelper
{
    /**
     * @param Charsheet $charsheet
     *
     * @return Collection
     */
    public function getCharacteristicForCharsheet(Charsheet $charsheet): Collection
    {
        $currentValues = $charsheet
            ->characteristics()
            ->get()
            ->keyBy('slug');

        $characteristics = $currentValues->filter(function (Characteristic $item) {
            return !$item->parent_id;
        });

        foreach ($characteristics as $characteristic) {
            $characteristic->value = $characteristic->pivot->value;
        }

        $notParentCurrentValues = $currentValues->filter(function (Characteristic $item) {
            return $item->parent_id;
        });

        if ($notParentCurrentValues->isNotEmpty()) {
            foreach ($notParentCurrentValues as $characteristic) {
                /** @var Characteristic $parent */
                $parent = $characteristics->find($characteristic->parent_id);

                if ($parent) {
                    if ($currentChild = $parent->children->find($characteristic->id)) {
                        $currentChild->value = $characteristic->pivot->value;
                    } else {
                        $characteristic->value = $characteristic->pivot->value;

                        $parent->children->push($characteristic);
                    }
                }
            }
        }

        return $characteristics;
    }
}
