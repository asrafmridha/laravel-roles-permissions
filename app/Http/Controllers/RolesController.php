<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view('backend.pages.roles.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permission_group = DB::table('permissions')
        //     ->select('group_name')
        //     ->groupBy('group_name')
        //     ->get();
        // dd($permission_group);

        //getPermissionGroup is a static function which we  declare in User Model and it's access from anywhere
        
        $PermissionGroup = User::getPermissionGroup();
        $permission = Permission::all();
        return view('backend.pages.roles.create', compact('permission', 'PermissionGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ], [
            'name.required' => 'Please Give a Name First',
        ]);
        $role = Role::create(['name' => $request->name]);
        $permissions = $request->permissions;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        return back()->withSuccess('Roles Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findById($id);
        $PermissionGroup = User::getPermissionGroup();
        $permission = Permission::all();
        return view('backend.pages.roles.edit', compact('permission', 'PermissionGroup', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100'
        ], [
            'name.required' => 'Please Give a Name First',
        ]);
        $role = Role::findById($id);
        $permissions = $request->permissions;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        return back()->withSuccess('Roles Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
