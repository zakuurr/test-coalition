@extends('layouts.app')

@section('content')
 <!--  Row 1 -->
 <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">


            <h5 class="card-title fw-semibold mb-4">Task</h5>

            <select name="project" id="project" class="form-control">
                <option value="" disabled selected>Please Select The Project</option>
                @foreach ($projects as $project)
                <option value="{{ $project->id }}" data-tasks="{{ json_encode($project->task) }}">{{ $project->name }}</option>
                @endforeach
              </select>

            <a href="{{ route('tasks.create') }}" class="btn btn-primary m-3"> <span><i class="ti ti-plus mb-3"></i></span></a>
            <div class="task" id="task">
                <table class="table table-bordered" id="taskTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Priority</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


@endsection


