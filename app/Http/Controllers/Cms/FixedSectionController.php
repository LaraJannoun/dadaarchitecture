<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\FixedSection;
use Storage;

class FixedSectionController extends Controller
{

    public function page_info()
    {
        $page_info = [
            'title' => 'Fixed Sections',
            'link' => 'fixed-sections',
            'table_name' => 'fixed_sections'
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

        $rows = FixedSection::select([
            'id',
            'slug',
            'image',
            'title',
            'text'
        ])->orderBy('slug', 'asc')->get();

        return view('cms.pages.' . $page_info['link'] . '.index', compact('page_info', 'rows'));
    }

    /**
     * Display a listing of the specified row
     *
     */
    public function show($id)
    {
        $page_info = $this->page_info();

        $row = FixedSection::findOrFail($id);

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
            'slug' => 'required|unique:' . $page_info['table_name']
        ]);

        $image_path = null;
        if ($request->image) {
            $this->validate($request, [
                'image' => 'required|mimes:png,jpg,jpeg|max:2000'
            ]);
            $image_path = parent::store_file($page_info['link'], $request->image);
        }

        $row = new FixedSection;
        $row->slug = $request->slug;
        $row->image = $image_path;
        $row->title = $request->title;
        $row->text = $request->text;
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

        $row = FixedSection::findOrFail($id);
        return view('cms.pages.' . $page_info['link'] . '.edit', compact('page_info', 'row'));
    }

    /**
     * Update the specified row in the database
     *
     */
    public function update(Request $request, $id)
    {
        $page_info = $this->page_info();

        $row = FixedSection::findOrFail($id);

        // Check if the image exists
        $image_path = $row['image'];
        if ($request->image) {
            $this->validate($request, [
                'image' => 'required|mimes:png,jpg,jpeg|max:2000'
            ]);
            $image_path = parent::store_file($page_info['link'], $request->image);
        }

        $row->image = $image_path;
        $row->title = $request->title;
        $row->text = $request->text;
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

        FixedSection::findOrFail($id)->delete();

        return redirect()->route('admin.' . $page_info['link'] . '.index')->withStatus('Record successfully deleted.');
    }

    /**
     * Remove Brochure function
     *
     */
    public function imageRemove($id)
    {
        $page_info = $this->page_info();

        $row = FixedSection::findOrFail($id);
        $row->image = null;
        $row->save();

        return redirect()->route('admin.' . $page_info['link'] . '.index')->withStatus('Record successfully deleted.');
    }
}
