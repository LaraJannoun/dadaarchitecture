<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{

    public function page_info(){
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
    public function index(Admin $model)
    {
        $page_info = $this->page_info();

        return view('cms.pages.'.$page_info['link'].'.index', ['admins' => $model->get()], compact('page_info'));
    }

    /**
     * Show the form for creating a new row
     *
     */
    public function create()
    {
        $page_info = $this->page_info();
        return view('cms.pages.'.$page_info['link'].'.create', compact('page_info'));
    }

    /**
     * Store a newly created row in the database
     *
     */
    public function store(AdminRequest $request, Admin $model)
    {
        $page_info = $this->page_info();

        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Admin successfully created.');
    }

    /**
     * Show the form for editing the specified row
     *
     */
    public function edit(Admin $admin)
    {
        $page_info = $this->page_info();
        return view('cms.pages.'.$page_info['link'].'.edit', compact('page_info', 'admin'));
    }

    /**
     * Update the specified row in the database
     *
     */
    public function update(AdminRequest $request, Admin  $admin)
    {
        $page_info = $this->page_info();

        $admin->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
            ->except([$request->get('password') ? '' : 'password']
        ));

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

}