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
                        @include('backend.partial.message')
                        <div class="modal-body">

                            <input type="text" name="name" class="form-control" placeholder="Role">
                            <br><br>
                            <h5>Permissions</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkPermissionAll" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    All
                                </label>
                            </div>
                                @php
                                    $i=1;
                                @endphp

                                @foreach ($PermissionGroup as $group)
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                            </div>

                                        </div>
                                        <div class="col-md-9 role-{{ $i }}-management-checkbox">
                                            @php
                                              $permission=DB::table('permissions')->where('group_name',$group->name)->get();
                                              
                                            // $permission = App\Models\User::getPermissionGroup($group->name);
                                            //  $j = 1;
                                            @endphp
                                            @foreach ($permission as $permission)

                                            {{-- @php
                                                dd($permission);
                                            @endphp --}}
                                                <div class="form-check mt-3">
                                                    <label class="ckbox">
                                                        <input type="checkbox" id="permissionCheck{{ $permission->name }}" value=" {{ $permission->id }}" name="permissions[]">
                                                        <span>{{ $permission->name }}</span>
                                                    </label>
                                                </div> 
                                                {{-- @php  $j++; @endphp --}}
                                            @endforeach 
                                        </div>
                                    </div>
                                       {{-- @php  $i++; @endphp  --}}
                                @endforeach

                                {{-- @foreach ($permission as $permission)
                                <div class="form-check mt-3">
                                    <label class="ckbox">
                                        <input type="checkbox" id="permissionCheck{{ $permission->id }}" value=" {{ $permission->id }}" name="permissions[]">
                                        <span>{{ $permission->name }}</span>
                                    </label>
                                </div>
                                @endforeach     --}}
                        </div>
                    </div>
                  
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </div>
                </form>
        </div>
@endsection


@section('js')
    <script>
        $(document).ready(function(){
             $('#checkPermissionAll').click(function(){
                 if($(this).is(':checked')){
                    //Check All the CheckBox
                    $('input[type=checkbox]').prop('checked',true);
                }else{
                    //UnCheck All the CheckBox
                    $('input[type=checkbox]').prop('checked',false);
                };
            });
           
        });
    </script>
@endsection    