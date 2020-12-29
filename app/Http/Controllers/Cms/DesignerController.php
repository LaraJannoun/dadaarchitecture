<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Designer;

class DesignerController extends Controller
{

    public function page_info()
    {
        $page_info = [
            'title' => 'Designer',
            'link' => 'designers',
            'table_name' => 'designers'
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

        $rows = Designer::select([
            'id',
            'name',
            'title',
            'facebook_link',
            'instagram_link',
            'image',
            'publish',
            'pos',
        ])->orderBy('pos')->get();

        return view('cms.pages.'.$page_info['link'].'.index', compact('page_info', 'rows'));
    }

    /**
     * Display a listing of the specified row
     *
     */
    public function show($id)
    {
        $page_info = $this->page_info();
        $row = Designer::findOrFail($id);

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
        $this->validate($request, [
            'image' => 'required|mimes:png,jpg,jpeg|max:500'
        ]);

        $row = new Designer;
        $row->name = $request->name;
        $row->title = $request->title;
        $row->facebook_link = $request->facebook_link;
        $row->instagram_link = $request->instagram_link;
        $row->image = parent::store_file($page_info['link'], $request->image);
        $row->pos = $request->pos;

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

        $row = Designer::findOrFail($id);
        return view('cms.pages.'.$page_info['link'].'.edit', compact('page_info', 'row'));
    }

    /**
     * Update the specified row in the database
     *
     */
    public function update(Request $request, $id)
    {
        $page_info = $this->page_info();

        $row = Designer::findOrFail($id);
        $row->name = $request->name;
        $row->title = $request->title;
        $row->facebook_link = $request->facebook_link;
        $row->instagram_link = $request->instagram_link;
        $image_path = $row['image'];
        if($request->image){
            $this->validate($request, [
                'image' => 'required|mimes:png,jpg,jpeg|max:500'
            ]);
            $image_path = parent::store_file($page_info['link'], $request->image);
        }
        $row->image = $image_path;
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

        $row = Designer::findOrFail($id);
        $row->delete();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully deleted.');
    }

    /**
     * Show the form for ordering all rows
     *
     */
    public function order()
    {
        $page_info = $this->page_info();

        $rows = Designer::select([
            'id',
            'name'
        ])->orderBy('pos')->get();

        return view('cms.pages.'.$page_info['link'].'.order', compact('page_info', 'rows'));
    }

    /**
     * Update the order for all rows in the database
     *
     */
    public function orderSubmit(Request $request)
    {
        $page_info = $this->page_info();

        foreach ($request->id as $key => $id) {
            $row = Designer::findOrFail($id);
            $row->pos = $request->pos[$key];
            $row->save();
        }

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Records successfully ordered.');
    }

    /**
     * Publish a specified row
     *
     */
    public function publish(Request $request)
    {
        $id = $request['id'];
        $row = Designer::findOrFail($id);
        $row->publish = !$row->publish;
        $row->save();
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

        $row = Designer::whereIn('id', $ids)->delete();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully deleted.');
    }

}
