@extends('layouts.app')

@section('content')
 <!--  Row 1 -->
 <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <h5 class="card-title fw-semibold mb-4">Projects</h5>
            <a href="/projects/create" class="btn btn-primary mb-3"> <span><i class="ti ti-plus mb-3"></i></span></a>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>
                           <a href="/projects/edit/{{ $p->id }}" class="btn btn-warning"> <span><i class="ti ti-edit"></i></span></a>
                          <form action="/projects/delete/{{ $p->id }}" class="d-inline" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger"><span><i class="ti ti-trash"></i></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>


@endsection


