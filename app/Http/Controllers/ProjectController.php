<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Alert;
use App\Http\Requests\ProjectEditRequest;
use Exception;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    public function index():Response
    {
        $data = [
            "title" => "All List Project",
            "projects" => Project::all()
        ];
        return response()->view("projects.index", $data);
    }

    public function store(ProjectStoreRequest $request)
    {
        $validated = $request->validated();

        try{
            Project::create($validated);
        }catch(Exception $e){

        }

        Alert::success('Hore!', 'Project Created Successfully');
        return redirect()->to('/projects');
    }

    public function create():Response
    {
        return response()->view("projects.create");
    }

    public function edit(int $id):Response
    {
        $data = [
            "title" => "Edit Task",
            "projects" => Project::find($id),
        ];
        return response()->view("projects.edit", $data);
    }

    public function update(ProjectEditRequest $request, int $id): RedirectResponse
    {
        $validated = $request->validated();

        $edited = Project::where("id", $id)->update($validated);

        if($edited){
            Alert::success('Hore!', 'Project Updated Successfully');
            return redirect()->route("projects.index");
        }

        Alert::error('error!', 'Project Created Failed');
        return redirect()->route("projects.index");
    }

    public function destroy(int $id)
    {
        $deleted = Project::destroy($id);

        if($deleted){
            Alert::success('Hore!', 'Project Deleted Successfully');
            return redirect()->route("projects.index");
        }

        Alert::error('error!', 'Project Deleted Failed');
        return redirect()->route("projects.index");
    }


}
