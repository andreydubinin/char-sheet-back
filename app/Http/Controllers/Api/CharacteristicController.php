<?php

namespace App\Http\Controllers\Api;

use App\Characteristic;
use App\Charsheet;
use App\Helpers\CharacteristicHelper;
use App\Http\Requests\Characteristic\StoreRequest;
use App\Http\Resources\CharacteristicResource;
use Illuminate\Http\JsonResponse;

/**
 * Class CharacteristicController
 * @package App\Http\Controllers\Api
 */
class CharacteristicController
{
    /** @var CharacteristicHelper */
    private $characteristicHelper;

    /**
     * CharacteristicController constructor.
     *
     * @param CharacteristicHelper $characteristicHelper
     */
    public function __construct(CharacteristicHelper $characteristicHelper)
    {
        $this->characteristicHelper = $characteristicHelper;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $characteristics = Characteristic::all();

        return CharacteristicResource::collection($characteristics)->response();
    }

    /**
     * @param Charsheet $charsheet
     *
     * @return JsonResponse
     */
    public function getForCharsheet(Charsheet $charsheet): JsonResponse
    {
        return CharacteristicResource::collection($this->characteristicHelper->getCharacteristicForCharsheet($charsheet))
            ->response();
    }

    /**
     * @param StoreRequest $request
     * @param Charsheet    $charsheet
     *
     * @return CharacteristicResource
     */
    public function storeForCharsheet(StoreRequest $request, Charsheet $charsheet): CharacteristicResource
    {
        $characteristic                 = new Characteristic();
        $characteristic->is_default     = false;
        $characteristic->name           = $request->input('name');
        $characteristic->parent_id      = $request->input('parent_id');
        $characteristic->charsheet_type = $charsheet->type;
        $characteristic->save();

        $charsheet->characteristics()->syncWithoutDetaching([
            $characteristic->id => ['value' => 0],
        ]);

        return new CharacteristicResource($characteristic);
    }
}
