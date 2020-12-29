<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use Illuminate\Support\Carbon;
use App\Models\Project;
use App\Models\User;
use App\Models\ContactRequest;

class DashboardController extends Controller
{

    public function index()
    {
        /**
        * General Constant
        *
        */

        $today = Carbon::now();

        /**
        * Projects Widgets
        *
        */

        // Get published projects
        $projects_published = Project::where('publish', 1)->count();
        // Get unpublished projects
        $projects_unpublished = Project::where('publish', 0)->count();
        // Get last article date
        $last_article = Project::select('created_at')->where('publish', 1)->orderBy('created_at', 'desc')->first();
        $projects_interval_days = null;
        if($last_article){
            $last_article_created_at = $last_article->created_at;
            $projects_interval_days = $last_article_created_at->diff($today)->format('%a');
        }


        /**
        * Form & Submissions
        *
        */

        $contact_form_count = ContactRequest::count();

        return view('cms.pages.dashboard', compact(
            'projects_published',
            'projects_unpublished',
            'projects_interval_days',
            'contact_form_count'
        ));
    }

}
