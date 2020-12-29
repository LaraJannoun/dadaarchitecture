<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ProfileDetail;
use App\Models\Designer;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

        $page_title = 'Profile';
        $banners = Banner::select([
            'id',
            'slug',
            'image',
            'title'
        ])->where('slug', 'profile')->get()->map(function($query){
            $query->image = asset($query->image);
            return $query;
        });
        $banner = $banners[0];
            
        $profile_detail = ProfileDetail::select([
            'id',
            'title',
            'description',
        ])->get();
                
        $designers = Designer::select([
            'id',
            'name',
            'title',
            'facebook_link',
            'instagram_link',
            'image',
            'pos',
        ])->where('publish', 1)->orderBy('pos')->get();

        return view('web/pages/profile', compact(
            'page_title', 'banner', 'profile_detail', 'designers'
        ));
    }
}
