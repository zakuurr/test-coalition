
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Update Task</h5>
        <div class="card">
          <div class="card-body">
            <form action="{{ route('tasks.update', $tasks->id) }}" method="POST">
                @csrf
                @method("PATCH")
              <div class="mb-3">
                <label for="nameproject" class="form-label">Name Task</label>
                <input type="text" class="form-control" id="nameproject" name="name" value="{{ $tasks->name }}">

              </div>

              <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <input type="text" class="form-control" id="priority" name="priority" value="{{ $tasks->priority }}">

              </div>

              <div class="mb-3">
                <label for="priority" class="form-label">Project</label>
                <select name="project_id" class="form-control">
                    <option value="" disabled selected>Please Select The Project</option>
                    @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $project->id == $tasks->project_id ? 'selected' : null}}>{{ $project->name }}</option>
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
