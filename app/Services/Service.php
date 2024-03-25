<?php
namespace App\Services;

use App\Http\Resources\DeskResource;
use App\Models\Desk;
use App\Models\deskList;

class Service
{
    public function store($data){
        $created_dask = Desk::create([
            'name' => $data['name']
        ]);
        foreach($data['lists'] as $list){
            deskList::create(['desk_id' => $created_dask->id,
            'name' => $list]);
        }
            
        return new DeskResource($created_dask);
    }
    public function update($data, $desk){
        $desk->update(['name' => $data['name']]);
        $old_lists = deskList::where('desk_id', $desk->id)->get();
        foreach($old_lists as $old_list){
            $old_list->delete();
        };
        foreach($data['lists'] as $list){
            deskList::create(['desk_id' => $desk->id,
            'name' => $list]);
        }
        return new DeskResource($desk);
    }
    
}
?>