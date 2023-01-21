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
                    <h4 class="card-title">Total Users ({{ count($users) }})</h4>
                    <h6 class="card-title text-right"><a class="btn btn-primary" href="{{ route('users.create') }}">Create User</a> </h6>
                </div> 
            
                <div class="table-responsive " >
                    <table class="table table-white " >
                        <thead>
                                
                            <tr>
                                <th>sl</th>
                                <th> Name</th>
                                <th> Email</th>
                                <th> Roles</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $users)
                            
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td> {{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                {{-- <td>

                                    @foreach ($users->permissions as $item)
                                       <span class="badge badge-info mr-1">
                                        {{ $item->name }}
                                       </span>
                                    @endforeach
                                </td> --}}
                                <td>{{ $users->roles }}</td>
                                <td> <a href="{{ route('roles.edit',$users->id) }}" class="btn btn-primary">Edit</a>
                                <form class="form-group" action="{{ route('roles.destroy',$users->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger">Delete</button>
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





@endsection
@section('js')

@endsection

