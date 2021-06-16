<?php

namespace App\Http\Controllers\Api;

use App\Characteristic;
use App\Charsheet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Charsheet\SetCharacteristicRequest;
use App\Http\Requests\Charsheet\StoreRequest;
use App\Http\Requests\Charsheet\UpdateRequest;
use App\Http\Resources\CharsheetResource;
use Auth;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CharsheetController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Charsheet::class, 'charsheet');
    }

    /**
     * @param Charsheet $charsheet
     *
     * @return CharsheetResource
     */
    public function show(Charsheet $charsheet): CharsheetResource
    {
        $charsheet->load('characteristics');

        return new CharsheetResource($charsheet);
    }

    /**
     * @param StoreRequest $request
     *
     * @return CharsheetResource
     */
    public function store(StoreRequest $request): CharsheetResource
    {
        $charsheet          = new Charsheet();
        $charsheet->user_id = Auth::id();
        $charsheet->type    = $request->input('type', Charsheet::TYPE_SAVAGE_WORLD);
        $charsheet->save();

        $characteristics = Characteristic::whereCharsheetType($charsheet->type)
            ->whereIsDefault(true)
            ->get();

        $characteristicValues = [];

        foreach ($characteristics as $characteristic) {
            $characteristicValues[$characteristic->id] = ['value' => 0];
        }

        $charsheet->characteristics()->syncWithoutDetaching($characteristicValues);

        return new CharsheetResource($charsheet);
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $charsheets = Charsheet::where('user_id', Auth::id())->get();

        return CharsheetResource::collection($charsheets)->response();
    }

    /**
     * @param \App\Http\Requests\Charsheet\UpdateRequest $request
     * @param \App\Charsheet                             $charsheet
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update(UpdateRequest $request, Charsheet $charsheet): JsonResponse
    {
        try {
            DB::beginTransaction();
            $charsheet->update($request->input());
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return response()->json([
                'message' => 'Ошибка сохранения чарника!',
                'error'   => $exception->getMessage(),
            ], 400);
        }

        return response()->json(['message' => 'Чарник изменен!']);
    }

    /**
     * @param SetCharacteristicRequest $request
     * @param Charsheet                $charsheet
     *
     * @return JsonResponse
     * @throws \Throwable
     */
    public function setCharacteristic(SetCharacteristicRequest $request, Charsheet $charsheet): JsonResponse
    {
        try {
            DB::beginTransaction();
            $charsheet->characteristics()->syncWithoutDetaching([
                $request->input('characteristic_id') => ['value' => $request->input('value')],
            ]);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return response()->json([
                'message' => 'Ошибка сохранения чарника!',
                'error'   => $exception->getMessage(),
            ], 400);
        }

        return response()->json(['message' => 'Чарник изменен!']);
    }

    protected function resourceAbilityMap(): array
    {
        return array_merge(parent::resourceAbilityMap(), [
            'setCharacteristic' => 'update',
        ]);
    }
}
