<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use DataTables;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role_list|role_create|role_edit|role_delete', ['only' => ['index','store']]);
         $this->middleware('permission:role_create', ['only' => ['create','store']]);
         $this->middleware('permission:role_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role_delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$permission = Permission::create(['name' => 'role_delete']);
        return view('admin.roles.list');
    }

    public function getAjaxRole(){
        $post = Role::get();
       // dd($post);
        return DataTables::of($post)
        ->addColumn('id', function ($post) {
            return $post->id;
        })
        ->addColumn('name', function ($post) {
            return $post->name;
        })
        ->addColumn('action', function ($post) {
            //$user = auth()->user()->id;
            //$role_edit = $user->can('role_edit');
            $btn = '';
            if(Auth::user()->can('role_edit')) {
                $btn .= '<a href="'.url("admin/roles").'/'.$post->id.'/edit'.'" class="edit btn btn-primary btn-sm">Edit</a>&nbsp;';
             
            }
            if(Auth::user()->can('role_delete')) {
                $btn .= '<button id="deleteRecord" class="edit btn btn-danger btn-sm btn-delete" data-url="'.url("admin/roles").'/'.$post->id.'">Delete</button>';
            }
            return $btn;
        })
        ->rawColumns(['action','role'])
        ->make(true);
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roletitle       = 'Add Role';
        $permissions     = Permission::get();
        $rolePermissions = [];
        return view('admin.roles.add',compact('permissions', 'roletitle','rolePermissions'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect('admin/roles')->with('flash_message_success', 'Role has been added successfully!'); 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd('aaaaa');
        $roletitle  = 'Edit Role';
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
            
       //dd($rolePermissions);
        //return redirect('admin/roles')->with('flash_message_success', 'User has been updated successfully!');
        return view('admin.roles.edit',compact('role','permissions','rolePermissions', 'roletitle'));
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        return redirect('admin/roles')->with('flash_message_success', 'Role updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect('admin/roles')->with('flash_message_success', 'Role deleted successfully!');
    }
}