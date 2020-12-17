<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){

        $page_title = 'Services';

        return view('pages/services', compact(
            'page_title'
        ));
    }
}
