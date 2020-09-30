<?php

namespace App\Http\Controllers\Api;

use App\Characteristic;
use App\Charsheet;
use App\Helpers\CharacteristicHelper;
use App\Http\Resources\CharacteristicResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class CharacteristicController
 * @package App\Http\Controllers\Api
 */
class CharacteristicController
{
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
     * @param Request   $request
     * @param Charsheet $charsheet
     *
     * @return JsonResponse
     */
    public function getForCharsheet(Request $request, Charsheet $charsheet): JsonResponse
    {
        return CharacteristicResource::collection($this->characteristicHelper->getCharacteristicForCharsheet($charsheet))
            ->response();
    }
}
