
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Add Task</h5>
        <div class="card">
          <div class="card-body">
            <form method="POST" action="/tasks/store">
                @csrf
              <div class="mb-3">
                <label for="nametasks" class="form-label">Name Task</label>
                <input type="text" class="form-control" id="nametasks" name="name">

              </div>

              <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <input type="text" class="form-control" id="priority" name="priority">

              </div>
              <div class="mb-3">
                <label for="priority" class="form-label">Project</label>
                <select name="project_id" class="form-control">
                    <option value="" disabled selected>Please Select The Project</option>
                    @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                  </select>

              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
