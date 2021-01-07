<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\Media;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $page_title = 'Projects';
        $projects =  Project::select([
            'id',
            'slug',
            'main_image',
            'category_id',
            'title',
            'description',
            'client',
            'date',
            'status',
            'pos',
            'publish'
            ])->where('publish', 1)->orderBy('pos')->get()->map(function($query){
                $query->main_image = asset($query->main_image);
                return $query;
            });

        $categories = Category::select([
            'id',
            'title',
        ])->get();

        return view('web/pages/projects', compact(
            'page_title', 'projects', 'categories'
        ));
    }

    public function single($slug){

        $page_title = 'Project - '.$slug;
        $projects =  Project::select([
            'id',
            'slug',
            'category_id',
            'title',
            'description',
            'main_image',
            'client',
            'date',
            'status',
            'pos',
            'views'
            ])->where('slug', $slug)->get();
            $project_detail = $projects[0];

        $media = Media::select([
            'id',
            'image',
            'title',
            'project_id',
            ])->where('project_id', $project_detail->id)->get();

        $previous_next = Project::select([
            'id',
            'slug',
            'pos'
            ])->whereIn('pos', [$project_detail->pos += 1, $project_detail->pos -= 2])
            ->get();

        $row = Project::findOrFail($project_detail->id);
        $views = $row->views;
        $row->views = $views += 1;
        $row->save();

        return view('web/pages/project-detail', compact(
            'page_title', 'media', 'project_detail', 'previous_next'
        ));
    }
}
