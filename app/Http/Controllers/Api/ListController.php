<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\List\ListStoreRequest;
use App\Http\Requests\List\ListUpdateRequest;
use App\Http\Resources\DaskListResource;
use App\Models\deskList;
use App\Services\ListService;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public $Listservice;
    
    public function __construct(ListService $Listservice)
    {
        $this->Listservice = $Listservice;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DaskListResource::collection(deskList::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListStoreRequest $request)
    {
        $data=$request->validated();
        return $this->Listservice->store($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(deskList $list)
    {
        return new DaskListResource($list);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListUpdateRequest $request, deskList $list)
    {
        $data=$request->validated();
        return $this->Listservice->update($data, $list);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(deskList $list)
    {
        return $this->Listservice->destroy($list);
    }
}
