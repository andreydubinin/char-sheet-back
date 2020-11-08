<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Power\DestroyRequest;
use App\Http\Requests\Power\IndexRequest;
use App\Http\Requests\Power\StoreRequest;
use App\Http\Requests\Power\UpdateRequest;
use App\Http\Resources\PowerResource;
use App\Power;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PowerController extends Controller
{
    /**
     * @param IndexRequest $request
     *
     * @return JsonResponse
     */
    public function index(IndexRequest $request): JsonResponse
    {
        return PowerResource::collection(Power::whereCharsheetId($request->getCharsheetId())->get())->response();
    }

    /**
     * @param UpdateRequest $request
     * @param Power         $power
     *
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Power $power): JsonResponse
    {
        try {
            DB::beginTransaction();
            $power->update($request->input());
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return response()->json([
                'message' => 'Ошибка сохранения силы!',
                'error'   => $exception->getMessage(),
            ], 400);
        }

        return response()->json(['message' => 'Сила изменена!']);
    }

    public function store(StoreRequest $request): PowerResource
    {
        try {
            DB::beginTransaction();
            $power               = new Power();
            $power->charsheet_id = $request->getCharsheetId();
            $power->fill($request->input())->save();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw $exception;
        }

        return new PowerResource($power);
    }

    /**
     * @param DestroyRequest $request
     * @param Power          $power
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(DestroyRequest $request, Power $power): JsonResponse
    {
        try {
            DB::beginTransaction();
            $power->delete();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw $exception;
        }

        return response()->json(['message' => 'Сила удалена']);
    }
}
