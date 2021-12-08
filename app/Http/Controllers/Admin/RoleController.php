<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Gate::authorize('read-role');        


        return view('admin.role.index',[
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Gate::authorize('create-role');        


        return view('admin.role.create',[
            'permissions' => Permission::all()
        ]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Gate::authorize('create-role');        


        $role= Role::query()->create([
            'title' => $request->get('title')
        ]);

        $role->permissions()->attach($request->get('permissions'));

        return redirect(route('admin.role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        Gate::authorize('update-role',$role);        


        return view('admin.role.edit',[
            'permissions' => Permission::all(),
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        Gate::authorize('update-role',$role);        


        $role->update([
            'title' => $request->get('title')
        ]);

        $role->permissions()->sync($request->get('permissions'));

        return redirect(route('admin.role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        Gate::authorize('update-role',$role);        


         $role->permissions()->detach();

        $role->delete();

        return redirect(route('admin.role.index'));
    }
}
