<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class ProjectController extends Controller
{

    public function page_info()
    {
        $page_info = [
            'title' => 'Projects',
            'link' => 'projects',
            'table_name' => 'projects'
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

        $rows = Project::select([
            'id',
            'slug',
            'main_image',
            'category_id',
            'title',
            'description',
            'client',
            'date',
            'status',
            'pos',
            'publish'
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
        $row = Project::findOrFail($id);

        return view('cms.pages.'.$page_info['link'].'.show', compact('page_info', 'row'));
    }

    /**
     * Show the form for creating a new row
     *
     */
    public function create()
    {
        $page_info = $this->page_info();
        $categories = Category::select(['id', 'title'])->get();

        return view('cms.pages.'.$page_info['link'].'.create', compact('page_info', 'categories'));
    }

    /**
     * Store a newly created row in the database
     *
     */
    public function store(Request $request)
    {
        $page_info = $this->page_info();

        $this->validate($request, [
            'slug' => 'required|unique:'.$page_info['table_name'],
            'main_image' => 'required|mimes:png,jpg,jpeg|max:500',
            'title' => 'required'
        ]);

        $row = new Project;
        $row->slug = $request->slug;
        $row->main_image = parent::store_file($page_info['link'], $request->main_image);
        $row->date = parent::store_date($request->date);
        $row->title = $request->title;
        $row->description = $request->description;
        $row->client = $request->client;
        $row->category_id = $request->category_id;
        $row->status = $request->status;
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

        $row = Project::findOrFail($id);
        $categories = Category::select(['id', 'title'])->get();

        return view('cms.pages.'.$page_info['link'].'.edit', compact('page_info', 'row', 'categories'));
    }

    /**
     * Update the specified row in the database
     *
     */
    public function update(Request $request, $id)
    {
        $page_info = $this->page_info();
        $row = Project::findOrFail($id);
        $image_path = $row['main_image'];
        $row->slug = $request->slug;
        $row->date = parent::store_date($request->date);
        // Check if the image exists
        $image_path = $row['main_image'];
        if($request->main_image){
            $this->validate($request, [
                'slug' => 'required|unique:'.$page_info['table_name'].',slug,'.$row->id,
                'main_image' => 'required|mimes:png,jpg,jpeg|max:500',
                'title' => 'required'
            ]);
            $image_path = parent::store_file($page_info['link'], $request->main_image);
        }
        
        $row->main_image = $image_path;
        $row->title = $request->title;
        $row->description = $request->description;
        $row->client = $request->client;
        $row->status = $request->status;
        $row->category_id = $request->category_id;
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

        $row = Project::findOrFail($id);
        $row->publish = 0;
        $row->save();
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

        $row = Project::whereIn('id', $ids)->delete();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully deleted.');
    }

    /**
     * Replicate a specified row
     *
     */
    public function replicate($id)
    {
        $page_info = $this->page_info();

        $row = Project::findOrFail($id);
        $replicate = $row->replicate();
        $replicate->slug = $row->slug . "-" . 'copy-' . rand(1000, 9999);
        $replicate->publish = 0;
        $replicate->save();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully replicated.');
    }

    /**
     * Publish a specified row
     *
     */
    public function publish(Request $request)
    {
        $id = $request['id'];
        $row = Project::findOrFail($id);
        $row->publish = !$row->publish;
        $row->save();
    }


    /**
     * View all Soft Deleted rows
     *
     */
    public function trash()
    {
        $page_info = $this->page_info();

        $rows = Project::select([
            'id',
            'slug',
            'category_id',
            'title',
            'description',
            'client',
            'date',
            'status',
            'publish'
        ])->onlyTrashed()->orderBy('date', 'desc')->get();

        return view('cms.pages.'.$page_info['link'].'.trash', compact('page_info', 'rows'));
    }

    /**
     * Display a listing of the specified row
     *
     */
    public function trash_show($id)
    {
        $page_info = $this->page_info();

        $row = Project::withTrashed()->findOrFail($id);

        return view('cms.pages.'.$page_info['link'].'.show', compact('page_info', 'row'));
    }

    /**
     * Restore a Soft Deleted row
     *
     */
    public function trash_restore($id)
    {
        $page_info = $this->page_info();

        $row = Project::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully restored.');
    }

    /**
     * Remove the specified row from the database
     *
     */
    public function trash_destroy($id)
    {
        $page_info = $this->page_info();

        $row = Project::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('admin.'.$page_info['link'].'.trash')->withStatus('Record successfully deleted.');
    }

    /**
     * Show the form for ordering all rows
     *
     */
    public function order()
    {
        $page_info = $this->page_info();

        $rows = Project::select([
            'id',
            'title',
            'main_image',
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
            $row = Project::findOrFail($id);
            $row->pos = $request->pos[$key];
            $row->save();
        }

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Records successfully ordered.');
    }

}
