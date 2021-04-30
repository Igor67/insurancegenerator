<?php

namespace App\Http\Controllers;

use App\Models\Name;
use App\Http\Requests\StoreNameRequest;

class NameController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $page = Name::query()->paginate();
        return response()->json(compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNameRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreNameRequest $request)
    {
        $item = new Name;
        $item->fill($request->validated());
        $item->save();
        return response()->json(compact('item'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $item = Name::query()->findOrFail($id);
        return response()->json(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param StoreNameRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, StoreNameRequest $request)
    {
        $item = Name::query()->findOrFail($id);
        $item->update($request->validated());
        return response()->json(compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $count = Name::destroy($id);
        if ($count) {
            return response()->json('OK');
        }
        return response()->json('Resource already deleted!', 410);
    }
}
