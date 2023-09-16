
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Add Project</h5>
        <div class="card">
          <div class="card-body">
            <form method="POST" action="/projects/store">
                @csrf
              <div class="mb-3">
                <label for="nameproject" class="form-label">Name Project</label>
                <input type="text" class="form-control" id="nameproject" name="name">

              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
