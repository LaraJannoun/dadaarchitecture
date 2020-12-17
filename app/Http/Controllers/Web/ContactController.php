<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $page_title = 'Contact';

        return view('pages/contact', compact(
            'page_title'
        ));
    }
}
