<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function test()
    {
        // Role::create(['name' => 'admin']);
        Permission::create(['name' => 'edit article']);
    }
}
