<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\ServiceDetail;
use App\Models\Banner;
use App\Models\Client;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){

        $page_title = 'Services';
        $banners = Banner::select([
            'id',
            'slug',
            'image',
            'title'
        ])->where('slug', 'service')->get()->map(function($query){
            $query->image = asset($query->image);
            return $query;
        });
        $banner = $banners[0];

        $services = ServiceDetail::select([
            'id',
            'title',
            'description',
        ])->get();

        $clients = Client::select([
            'id',
            'image',
            'title',
            'pos'
        ])->where('publish', 1)->orderBy('pos')->get();

        return view('web/pages/services', compact(
            'page_title', 'banner', 'services', 'clients'
        ));
    }
}
