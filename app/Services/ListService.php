<?php
namespace App\Services;

use App\Http\Resources\DeskResource;
use App\Models\Desk;
use App\Models\deskList;
use App\Models\task;

class ListService
{
    public function store($data){ 
        $newlist =  deskList::create(
            [
            'desk_id' => $data['desk_id'],'name' => $data['name']
            ]);
        foreach($data['task'] as $task){
            task::create(['desk_lists_id' => $newlist->id,'name' => $task]);
        }

    $desk = Desk::find($data['desk_id']);
    return new DeskResource($desk);
    }
    
    public function update($data, $list){
        $old_tasks = task::where('desk_lists_id', $list->id)->get();
        foreach($old_tasks as $old_task){
            $old_task->delete();
        };
        foreach($data['task'] as $task){
            task::create(['desk_lists_id' => $list->id,'name' => $task]);
        };
        $desk = Desk::find($list->desk_id);
        return new DeskResource($desk);
    }
    public function destroy($list){
        $oldTasks = task::where('desk_lists_id', $list->id)->get();
        foreach($oldTasks as $oldTask){
            $oldTask->delete();
        };
        $desk = Desk::find($list->desk_id);
        $list->delete();
        return new DeskResource($desk);
    }
    
}
?>