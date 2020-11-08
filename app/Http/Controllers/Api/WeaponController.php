<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Weapon\DestroyRequest;
use App\Http\Requests\Weapon\StoreRequest;
use App\Http\Requests\Weapon\UpdateRequest;
use App\Http\Requests\Weapon\IndexRequest;
use App\Http\Resources\WeaponResource;
use App\Weapon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class WeaponController extends Controller
{
    /**
     * @param IndexRequest $request
     *
     * @return JsonResponse
     */
    public function index(IndexRequest $request): JsonResponse
    {
        return WeaponResource::collection(Weapon::whereCharsheetId($request->getCharsheetId())->get())->response();
    }

    /**
     * @param UpdateRequest $request
     * @param Weapon        $weapon
     *
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Weapon $weapon): JsonResponse
    {
        try {
            DB::beginTransaction();
            $weapon->update($request->input());
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return response()->json([
                'message' => 'Ошибка сохранения оружия!',
                'error'   => $exception->getMessage(),
            ], 400);
        }

        return response()->json(['message' => 'Оружие изменено!']);
    }

    public function store(StoreRequest $request): WeaponResource
    {
        try {
            DB::beginTransaction();
            $weapon               = new Weapon();
            $weapon->charsheet_id = $request->getCharsheetId();
            $weapon->fill($request->input())->save();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw $exception;
        }

        return new WeaponResource($weapon);
    }

    /**
     * @param DestroyRequest $request
     * @param Weapon         $weapon
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(DestroyRequest $request, Weapon $weapon): JsonResponse
    {
        try {
            DB::beginTransaction();
            $weapon->delete();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw $exception;
        }

        return response()->json(['message' => 'Оружие удалено']);
    }
}
