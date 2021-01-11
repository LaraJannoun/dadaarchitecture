<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{

    public function page_info()
    {
        $page_info = [
            'title' => 'Banners',
            'link' => 'banners',
            'table_name' => 'banners'
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

        $rows = Banner::select([
            'id',
            'slug',
            'image',
            'title'
        ])->get();

        return view('cms.pages.' . $page_info['link'] . '.index', compact('page_info', 'rows'));
    }

    /**
     * Display a listing of the specified row
     *
     */
    public function show($id)
    {
        $page_info = $this->page_info();
        $row = Banner::findOrFail($id);
        return view('cms.pages.' . $page_info['link'] . '.show', compact('page_info', 'row'));
    }

    /**
     * Show the form for creating a new row
     *
     */
    public function create()
    {
        $page_info = $this->page_info();
        return view('cms.pages.' . $page_info['link'] . '.create', compact('page_info'));
    }

    /**
     * Store a newly created row in the database
     *
     */
    public function store(Request $request)
    {
        $page_info = $this->page_info();

        $this->validate($request, [
            'slug' => 'required|unique:' . $page_info['table_name'],
            'image' => 'required|mimes:png,jpg,jpeg|max:2000'
        ]);

        $row = new Banner;
        $row->slug = $request->slug;
        $row->title = $request->title;
        $row->image = parent::store_file($page_info['link'], $request->image);
        $row->save();

        return redirect()->route('admin.' . $page_info['link'] . '.index')->withStatus('Record successfully created.');
    }

    /**
     * Show the form for editing the specified row
     *
     */
    public function edit($id)
    {
        $page_info = $this->page_info();
        $row = Banner::findOrFail($id);
        return view('cms.pages.' . $page_info['link'] . '.edit', compact('page_info', 'row'));
    }

    /**
     * Update the specified row in the database
     *
     */
    public function update(Request $request, $id)
    {
        $page_info = $this->page_info();
        $row = Banner::findOrFail($id);
        $image_path = $row['image'];
        if ($request->image) {
            $this->validate($request, [
                'image' => 'required|mimes:png,jpg,jpeg|max:2000'
            ]);
            $image_path = parent::store_file($page_info['link'], $request->image);
        }

        $row->image = $image_path;
        $row->title = $request->title;
        $row->save();

        return redirect()->route('admin.' . $page_info['link'] . '.index')->withStatus('Record successfully updated.');
    }

    /**
     * Remove the specified row from the database
     *
     */
    public function destroy($id)
    {
        $page_info = $this->page_info();

        Banner::findOrFail($id)->delete();

        return redirect()->route('admin.' . $page_info['link'] . '.index')->withStatus('Record successfully deleted.');
    }
}
