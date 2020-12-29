<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use App\Models\ContactRequest;

class ContactRequestController extends Controller
{

    public function page_info()
    {
        $page_info = [
            'title' => 'Contact Requests',
            'link' => 'contact-requests'
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

        $rows = ContactRequest::select([
            'id',
            'full_name',
            'email',
            'subject',
            'message',
            'created_at'
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
        $row = ContactRequest::findOrFail($id);

        return view('cms.pages.'.$page_info['link'].'.show', compact('page_info', 'row'));
    }

    /**
     * Remove the specified row from the database
     *
     */
    public function destroy($id)
    {
        $page_info = $this->page_info();
        ContactRequest::findOrFail($id)->delete();

        return redirect()->route('admin.'.$page_info['link'].'.index')->withStatus('Record successfully deleted.');
    }

}

