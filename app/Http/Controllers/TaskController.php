<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskEditRequest;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Exception;
Use Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index():Response
    {
        $data = [
            "title" => "List Tasks",
            "tasks" => Task::with('project')->orderBy('priority','ASC')->get(),
            "projects" => Project::with(["task"=> function ($query)
            {
               return $query->orderBy("priority");

            }])->get()
        ];

        return response()->view("tasks.index", $data);
    }

    public function create():Response
    {
        $data = [
            "title" => "List Tasks",
            "projects" => Project::all()
        ];
        return response()->view("tasks.create",$data);
    }

    public function store(TaskStoreRequest $request):RedirectResponse
    {
        $validatedData = $request->validated();

        try{
            Task::create($validatedData);
        }catch(Exception $e){

        }

        Alert::success('Hore!', 'Task Created Successfully');
        return redirect()->to('/tasks');
    }


    public function edit(int $id):Response
    {
        $data = [
            "title" => "Edit Task",
            "tasks" => Task::find($id),
            "projects" => Project::all()
        ];
        return response()->view("tasks.edit", $data);
    }


    public function delete(int $id):RedirectResponse
    {
        $data = [
            "title" => "Edit Task",
            "id" => $id
        ];
        Alert::success('Hore!', 'Task Deleted Successfully');
        return redirect()->to('/tasks');
    }

    public function update(TaskEditRequest $request, int $id):RedirectResponse
    {
        $validatedData = $request->validated();

        $updated = Task::where("id", $id)->update($validatedData);

        if($updated){
            Alert::success('Hore!', 'Task Updated Successfully');
            return redirect()->to('/tasks');
        }

        Alert::error('Uppss!', 'Task Updated Failed');
        return redirect()->to('/tasks');
    }

    public function destroy(int $id)
    {
        $deleted = Task::destroy($id);

        if($deleted){
            Alert::success('Hore!', 'Tasks Deleted Successfully');
            return redirect()->route("tasks.index");
        }

        Alert::error('error!', 'Tasks Deleted Failed');
        return redirect()->route("tasks.index");
    }


    public function reorder(Request $request)
    {
        $tasks = Task::all();

        foreach ($tasks as $t) {
            foreach ($request->order as $order) {
                if ($order['id'] == $t->id) {
                    $t->update(['order' => $order['position']]);
                }
            }
        }
       // Use SweetAlert to display a success message
    Alert::success('Hore!', 'Reorder Update Successfully');

    return response('Update Successfully.', 200);
    }
}
