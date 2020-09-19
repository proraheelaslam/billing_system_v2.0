<?php
namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DataTables;
use App\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        return view('admin.users.list');
    }

    public function getAjaxUser(){
            $post = Admin::get();
            
            return DataTables::of($post)
            ->addColumn('id', function ($post) {
                return $post->id;
            })
            ->addColumn('name', function ($post) {
                return $post->name;
            })
            ->addColumn('email', function ($post) {
                return $post->email;
            })
            ->addColumn('role', function ($post) {
                 $roles =  $post->getRoleNames();
                 $roleArray = [];
                 foreach($roles as $role){
                       array_push($roleArray, $role);
                 }
                 return $roleArray;
                 
            })
            ->addColumn('action', function ($post) {
                $btn = '<a href="'.url("admin/users").'/'.$post->id.'/edit'.'" class="edit btn btn-primary btn-sm">Edit</a>&nbsp<button id="deleteRecord" class="edit btn btn-danger btn-sm btn-delete" data-url="'.url("admin/users").'/'.$post->id.'">Delete</button>';
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
        $usertitle = 'Add Users';
        $user_id   = auth()->user()->id;
        $user      = admin::find($user_id);
        $roles     = Role::pluck('name','name')->all();
        //$userRole  = $user->roles->pluck('name','name')->all();
        //dd($userRole);
        return view('admin.users.add',compact('roles', 'usertitle'));
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
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = Admin::create($input);
        $user->assignRole($request->input('roles'));
        
        return redirect('admin/users')->with('flash_message_success', 'User has been added successfully!'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Admin::find($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usertitle = 'Edit User';
        $user      =  Admin::find($id);
        $roles     = Role::pluck('name','name')->all();
        $userRole  = $user->roles->pluck('name','name')->all();
        return view('admin.users.edit',compact('user','roles','userRole', 'usertitle'));
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
            'email' => 'required|email|unique:admins,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = Admin::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect('admin/users')->with('flash_message_success', 'User has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //dd('aaaaaa');
        Admin::find($id)->delete();
        return redirect('admin/users')->with('flash_message_success', 'User deleted successfully!');
    }

}
