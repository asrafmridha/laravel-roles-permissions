@extends('dashboard')
@section('usercreate')
    active
@endsection
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
            <div class="card col-md-12">
                @if(Session::has('success'))
                    <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                @include('backend.partial.message')
                <form action="{{ route('users.update',$user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12 ">
                            <label class="label h6" for="name">User Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter User Name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 ">
                            <label class="label h6" for="name">User Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter User Email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12 ">
                            <label class="label h6" for="name">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter User Password">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 ">
                            <label class="label h6" for="name">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password">
                        </div>
                    </div>

                    
                      
                        <div class="form-row">
                            <div class="form-group ">
                                <label for="password">Assign Roles</label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple>
                                    @foreach ($roles as $role)
                                        <option class="mr-5" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>     
                        <div class="modal-footer form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
        </div>
@endsection


@section('js')

@endsection    