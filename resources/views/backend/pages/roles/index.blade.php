@extends('dashboard')

@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">Feedback Table </a>
            </li>
        </ol>
    </div>
@endsection 

@section('content')

<div class="row" id="white-table" style="margin-left: 300px">
    <div class="col-12">
        <div class="card">
            @if(Session::has('success'))
                <p class="alert alert-info">{{ Session::get('success') }}</p>
            @endif
            <div class="card-header">
                <h4 class="card-title">Total Role ({{ count($role) }})</h4>
                <h6 class="card-title text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create Role</button> </h6>
            </div> 
           
            <div class="table-responsive " >
                <table class="table table-white " >
                    <thead>
                            
                        <tr>
                            <th>sl</th>
                            <th> Name</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($role as $role)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td> {{ $role->name }}</td>
                            <td> <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="name" class="form-control" placeholder="Role">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>


@endsection
@section('js')

@endsection

