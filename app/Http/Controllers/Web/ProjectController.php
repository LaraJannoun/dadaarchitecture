<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $page_title = 'Projects';
        return view('pages/projects', compact(
            'page_title'
        ));
    }

    public function single($slug){

        $page_title = 'Project - '.$slug;

        return view('pages/project-detail', compact(
            'page_title'
        ));
    }
}
