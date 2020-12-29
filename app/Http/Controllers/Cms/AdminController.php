<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Admin;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:admin-list|admin-publish', ['only' => ['index']]);
    //     $this->middleware('permission:admin-create', ['only' => ['create','store']]);
    //     $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    // }

    public function page_info()
    {
        $page_info = [
            'title' => 'Admins Management',
            'link' => 'admins'
        ];
        return $page_info;
    }

    /**
     * Display a listing of the Table
     *
     */
    public function index(Admin $admin)
    {
        $page_info = $this->page_info();

        return view('cms.pages.'.$page_info['link'].'.index', ['admins' => $admin->get()], compact('page_info'));
    }

    /**
     * Show the form for creating a new row
     *
     */
    public function create()
    {
        $page_info = $this->page_info();
        $roles = Role::pluck('name','name')->all();

        return view('cms.pages.'.$page_info['link'].'.create', compact('page_info', 'roles'));
    }

    /**
     * Store a newly created row in the database
     *
     */
    public function store(AdminRequest $request, Admin $admin)
    {
        $page_info = $this->page_info();

        $admin->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        $admin->assignRole($request->input('roles'));

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Admin successfully created.');
    }

    /**
     * Show the form for editing the specified row
     *
     */
    public function edit(Admin $admin)
    {
        $page_info = $this->page_info();

        $admin = Admin::find($admin)[0];
        $roles = Role::pluck('name','name')->all();
        $userRole = $admin->roles->pluck('name','name')->all();

        return view('cms.pages.'.$page_info['link'].'.edit', compact('page_info', 'admin', 'roles', 'userRole'));
    }

    /**
     * Update the specified row in the database
     *
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $page_info = $this->page_info();

        $admin->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
            ->except([$request->get('password') ? '' : 'password']
        ));

        DB::table('model_has_roles')->where('model_id', $admin->id)->delete();
        $admin->assignRole($request->input('roles'));

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Admin successfully updated.');
    }

    /**
     * Remove the specified row from the database
     *
     */
    public function destroy(Admin $admin)
    {
        $page_info = $this->page_info();

        $admin->delete();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Admin successfully deleted.');
    }

    /**
     * Block a specified admin
     *
     */
    public function block(Request $request)
    {
        $id = $request['id'];
        $admin = Admin::findOrFail($id);
        $admin->blocked = !$admin->blocked;
        $admin->save();

        return [
            'code' => 200,
            'status' => 'Success',
            'data' => $admin->blocked
        ];
    }

}
