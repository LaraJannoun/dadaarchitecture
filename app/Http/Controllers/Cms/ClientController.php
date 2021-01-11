<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{

    public function page_info()
    {
        $page_info = [
            'title' => 'Clients',
            'link' => 'clients',
            'table_name' => 'clients'
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

        $rows = Client::select([
            'id',
            'image',
            'title',
            'pos'
        ])->orderBy('pos')->get();

        return view('cms.pages.' . $page_info['link'] . '.index', compact('page_info', 'rows'));
    }

    /**
     * Display a listing of the specified row
     *
     */
    public function show($id)
    {
        $page_info = $this->page_info();
        $row = Client::findOrFail($id);
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
            'image' => 'required|mimes:png,jpg,jpeg|max:2000'
        ]);

        $row = new Client;
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
        $row = Client::findOrFail($id);
        return view('cms.pages.' . $page_info['link'] . '.edit', compact('page_info', 'row'));
    }

    /**
     * Update the specified row in the database
     *
     */
    public function update(Request $request, $id)
    {
        $page_info = $this->page_info();
        $row = Client::findOrFail($id);
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
        Client::findOrFail($id)->delete();
        return redirect()->route('admin.' . $page_info['link'] . '.index')->withStatus('Record successfully deleted.');
    }

    /**
     * Show the form for ordering all rows
     *
     */
    public function order()
    {
        $page_info = $this->page_info();

        $rows = Client::select([
            'id',
            'title',
            'image'
        ])->orderBy('pos')->get();

        return view('cms.pages.' . $page_info['link'] . '.order', compact('page_info', 'rows'));
    }

    /**
     * Update the order for all rows in the database
     *
     */
    public function orderSubmit(Request $request)
    {
        $page_info = $this->page_info();

        foreach ($request->id as $key => $id) {
            $row = Client::findOrFail($id);
            $row->pos = $request->pos[$key];
            $row->save();
        }

        return redirect()->route('admin.' . $page_info['link'] . '.index')->withStatus('Records successfully ordered.');
    }

    /**
     * Publish a specified row
     *
     */
    public function publish(Request $request)
    {
        $id = $request['id'];
        $row = Client::findOrFail($id);
        $row->publish = !$row->publish;
        $row->save();
    }
}
