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
        $characteristics = Characteristic::getAllDefaultWithChildren();

        $currentValues = $charsheet->characteristics()->get();

        $this->fillValues($characteristics, $currentValues);

        $notDefaultCharacteristics = $currentValues->filter(function (Characteristic $item) {
            return !$item->is_default;
        });

        if ($notDefaultCharacteristics->isNotEmpty()) {
            foreach ($notDefaultCharacteristics as $characteristic) {
                $characteristic->value = $characteristic->pivot->value;

                //todo: придумать, как вставлять в дерево
                $characteristics->push($characteristic);
            }
        }

        return $characteristics;
    }

    /**
     * @param Collection|Characteristic[] $characteristics
     * @param Collection                  $currentValues
     */
    private function fillValues(Collection $characteristics, Collection $currentValues)
    {
        if ($characteristics->isNotEmpty()) {
            foreach ($characteristics as $characteristic) {
                $value = 1;

                if ($currentValue = $currentValues->find($characteristic)) {
                    $value = $currentValue->pivot->value;
                }

                $characteristic->setValueAttribute($value);

                $this->fillValues($characteristic->children, $currentValues);
            }
        }
    }
}
