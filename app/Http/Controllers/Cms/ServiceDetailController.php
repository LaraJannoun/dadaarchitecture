<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ServiceDetail;

class ServiceDetailController extends Controller
{

    public function page_info()
    {
        $page_info = [
            'title' => 'Service Details',
            'link' => 'service-details',
            'table_name' => 'service_details'
        ];
        return $page_info;
    }

    /**
     * Display a listing of the Table
     *
     */
    public function index()
    {
        $page_info = $this->page_info();

        $rows = ServiceDetail::select([
            'id',
            'title',
            'description',
        ])->get();

        return view('cms.pages.'.$page_info['link'].'.index', compact('page_info', 'rows'));
    }

    /**
     * Display a listing of the specified row
     *
     */
    public function show($id)
    {
        $page_info = $this->page_info();

        $row = ServiceDetail::findOrFail($id);

        return view('cms.pages.'.$page_info['link'].'.show', compact('page_info', 'row'));
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
    public function store(Request $request)
    {
        $page_info = $this->page_info();

        $row = new ServiceDetail;
        $row->title = $request->title;
        $row->description = $request->description;
        $row->save();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully created.');
    }

    /**
     * Show the form for editing the specified row
     *
     */
    public function edit($id)
    {
        $page_info = $this->page_info();

        $row = ServiceDetail::findOrFail($id);

        return view('cms.pages.'.$page_info['link'].'.edit', compact('page_info', 'row'));
    }

    /**
     * Update the specified row in the database
     *
     */
    public function update(Request $request, $id)
    {
        $page_info = $this->page_info();

        $row = ServiceDetail::findOrFail($id);
        $row->title = $request->title;
        $row->description = $request->description;
        $row->save();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully updated.');
    }

    /**
     * Remove the specified row from the database
     *
     */
    public function destroy($id)
    {
        $page_info = $this->page_info();

        $row = ServiceDetail::findOrFail($id);
        $row->delete();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully deleted.');
    }

    /**
     * Remove the specified rows from the database
     *
     */
    public function bulk_delete(Request $request)
    {
        $page_info = $this->page_info();

        if(empty($request['bulk-delete'])){
            return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('No Records have been deleted.');
        }

        $ids = explode(',', $request['bulk-delete']);

        $row = ServiceDetail::whereIn('id', $ids)->delete();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully deleted.');
    }

}
