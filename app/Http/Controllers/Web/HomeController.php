<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\HomeSlider;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $page_title = 'Home';
        $home_sliders =  HomeSlider::select([
        'id', 
        'image', 
        'title'
        ])->get()->map(function($query){
            $query->image = asset($query->image);
            return $query;
        });
        
        return view('web/pages/home', compact(
            'page_title', 'home_sliders'
        ));
    }

    
}
