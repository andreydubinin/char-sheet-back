<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\DestroyRequest;
use App\Http\Requests\Equipment\IndexRequest;
use App\Http\Requests\Equipment\StoreRequest;
use App\Http\Requests\Equipment\UpdateRequest;
use App\Http\Resources\EquipmentResource;
use App\Equipment;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{
    /**
     * @param IndexRequest $request
     *
     * @return JsonResponse
     */
    public function index(IndexRequest $request): JsonResponse
    {
        return EquipmentResource::collection(Equipment::whereCharsheetId($request->getCharsheetId())->get())->response();
    }

    /**
     * @param UpdateRequest $request
     * @param Equipment     $equipment
     *
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Equipment $equipment): JsonResponse
    {
        try {
            DB::beginTransaction();
            $equipment->update($request->input());
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return response()->json([
                'message' => 'Ошибка сохранения Снаряжения!',
                'error'   => $exception->getMessage(),
            ], 400);
        }

        return response()->json(['message' => 'Снаряжение изменено!']);
    }

    /**
     * @param StoreRequest $request
     *
     * @return EquipmentResource
     * @throws Exception
     */
    public function store(StoreRequest $request): EquipmentResource
    {
        try {
            DB::beginTransaction();
            $equipment               = new Equipment();
            $equipment->charsheet_id = $request->getCharsheetId();
            $equipment->fill($request->input())->save();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw $exception;
        }

        return new EquipmentResource($equipment);
    }

    /**
     * @param DestroyRequest $request
     * @param Equipment      $equipment
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(DestroyRequest $request, Equipment $equipment): JsonResponse
    {
        try {
            DB::beginTransaction();
            $equipment->delete();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw $exception;
        }

        return response()->json(['message' => 'Снаряжение удалено']);
    }
}
