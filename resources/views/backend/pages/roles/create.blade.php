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
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
                        </div>
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control" placeholder="Role">
                    @foreach ($premission as $premission)
                        <div class="form-check mt-3">
                            <label class="ckbox">
                                <input type="checkbox" id="permissionCheck" value=" {{ $premission->id }}" name="permissions[]">
                                <span>{{ $premission->name }}</span>
                            </label>
                        </div>
                    @endforeach    
                    </div>
                    </div>
                  
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </div>
                </form>
        </div>
@endsection