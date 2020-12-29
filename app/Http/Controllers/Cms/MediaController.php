<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Project;

class MediaController extends Controller
{

    public function page_info()
    {
        $page_info = [
            'title' => 'Media',
            'link' => 'media',
            'table_name' => 'media'
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

        $rows = Media::select([
            'id',
            'image',
            'title',
            'project_id',
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
        return view('cms.pages.'.$page_info['link'].'.show', compact('page_info', 'row'));
    }

    /**
     * Show the form for creating a new row
     *
     */
    public function create()
    {
        $page_info = $this->page_info();
        $projects = Project::select(['id', 'title'])->get();

        return view('cms.pages.'.$page_info['link'].'.create', compact('page_info', 'projects'));
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

        $row = new Media;
        $row->title = $request->title;
        $row->image = parent::store_file($page_info['link'], $request->image);
        $row->project_id = $request->project_id;

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
        $projects = Project::select(['id', 'title'])->get();

        $row = Media::findOrFail($id);
        return view('cms.pages.'.$page_info['link'].'.edit', compact('page_info', 'row', 'projects'));
    }

    /**
     * Update the specified row in the database
     *
     */
    public function update(Request $request, $id)
    {
        $page_info = $this->page_info();

        $row = Media::findOrFail($id);
        $row->title = $request->title;
        // Check if the image exists
        $image_path = $row['image'];
        if($request->image){
            $this->validate($request, [
                'image' => 'required|mimes:png,jpg,jpeg|max:500'
            ]);
            $image_path = parent::store_file($page_info['link'], $request->image);
        }
        
        $row->image = $image_path;
        $row->project_id = $request->project_id;
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

        $row = Media::findOrFail($id);
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

        $row = Media::whereIn('id', $ids)->delete();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully deleted.');
    }

}
