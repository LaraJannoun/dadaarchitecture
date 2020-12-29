<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use App\Models\Setting;
use Artisan;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::findOrFail(1);

        return view('cms.pages.settings.index', compact(
            'settings'
        ));
    }

    public function maintenance()
    {
        $row = Setting::findOrFail(1);
        $row->maintenance_mode = !$row->maintenance_mode;
        $row->save();

        if($row->maintenance_mode){
            Artisan::call('down');
        } else {
            Artisan::call('up');
        }
    }

}
