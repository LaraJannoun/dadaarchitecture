<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\SeoMetaTag;

class SeoMetaTagController extends Controller
{

    public function page_info()
    {
        $page_info = [
            'title' => 'Seo Meta Tags',
            'link' => 'seo-meta-tags'
        ];
        return $page_info;
    }

    /**
     * Show the form for editing the specified row
     *
     */
    public function edit($id)
    {
        $page_info = $this->page_info();

        $row = SeoMetaTag::findOrFail($id);

        return view('cms.pages.'.$page_info['link'].'.edit', compact('page_info', 'row'));
    }

    /**
     * Update the specified row in the database
     *
     */
    public function update(Request $request, $id)
    {
        $page_info = $this->page_info();

        $row = SeoMetaTag::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:60',
            'description' => 'required|max:160'
        ]);

        $row->title = $request->title;
        $row->description = $request->description;
        $row->save();

        return redirect()->route('admin.'.$page_info['link'].'.edit', '1')->withStatus('Record successfully updated.');
    }

}
