
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Update Project</h5>
        <div class="card">
          <div class="card-body">
            <form action="{{ route('projects.update', $projects->id) }}" method="POST">
                @csrf
                @method("PATCH")
              <div class="mb-3">
                <label for="nameproject" class="form-label">Name Project</label>
                <input type="text" class="form-control" id="nameproject" name="name" value="{{ $projects->name }}">

              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
