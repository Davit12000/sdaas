<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskStoreRequest;
use App\Http\Resources\DeskResource;
use App\Models\Desk;
use App\Models\DeskList;
use App\Models\task;
use App\Services\Service;

class DeskController extends Controller
{
    public $service;
    
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DeskResource::collection(Desk::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeskStoreRequest $request)
    {
        $data=$request->validated();
     return $this->service->store($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Desk $desk)
    {
        return new DeskResource($desk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeskStoreRequest $request, Desk $desk)
    {
        $data=$request->validated();
        $this->service->update($data, $desk);
        return new DeskResource($desk);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desk $desk)
    {
        $oldLists = DeskList::where('desk_id', $desk->id)->get();
        foreach($oldLists as $oldList){
            $oldTasks = task::where('desk_lists_id', $oldList->id)->get();
            foreach($oldTasks as $oldTask){
                $oldTask->delete();
            };
            $oldList->delete();
        }
       $desk->delete();
       return response()->noContent();
    }
}
