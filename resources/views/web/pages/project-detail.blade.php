@extends('web.layouts.main')
 
@section('content')
<div class="project-container-background">
    <div class="slider-project-images-container">
    @if(count($media) > 0)
        @foreach($media as $image)
        <div class="slider-object">
            <img class="slider-image cover" src="{{ asset($image->image) }}" alt= "{{$image->title}}"/>
            <div class="left-arrow"></div>
            <div class="right-arrow"></div>
        </div>
        @endforeach
        @else
        <div class="slider-object">
            <img class="slider-image cover" src="{{ asset($project_detail->main_image) }}" alt= "{{$project_detail->title}}"/>
            <div class="left-arrow"></div>
            <div class="right-arrow"></div>
        </div>
        @endif
    </div>
    <div class="container">
        <h1 class="project-header-primary">{{$project_detail->title}}</h1>
        <div class="project-header-sub">
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <a href="" target="_blank" class="w-inline-block social-icon eye">
                        <div class="views mr-2"><i class="fa fa-eye mr-2 ml-2"></i>{{$project_detail->views}} views</div>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="http://www.facebook.com/sharer.php?t={{ $project_detail->title }}&u={{ route('project', $project_detail->slug) }}" target="_blank" class="mr-2 w-inline-block social-icon facebook">
                        <i class="fab fa-facebook-f mr-2 ml-2"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="http://twitter.com/intent/tweet?text={{ $project_detail->title }}&url={{ route('project', $project_detail->slug) }} " target="_blank" class="mr-2 w-inline-block social-icon twitter">
                        <i class="fab fa-twitter mr-2 ml-2"></i>
                    </a>
                    </li>
                <li class="list-inline-item no-border">
                    <a href="http://pinterest.com/pin/create/button/?description={{ $project_detail->title }}&url={{ route('project', $project_detail->slug) }} " target="_blank" class="mr-2 w-inline-block social-icon pinterest">
                        <i class="fab fa-pinterest mr-2 ml-2"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row secondary-color mt-lg-4 details">
            <div class="col-sm-12 col-md-8">
                <div class="detail-title">
                    Project description
                </div>
                <div class="d-inline-flex my-2">
                    <div>{{$project_detail->description}}</div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 project-details">
                <div class="detail-title">Project Details</div>
                <div class="d-inline-flex my-2">
                    <div>Client: {{$project_detail->client}}</div>
                </div>
                <div class="d-inline-flex mt-1 mb-1">
                    <div>Portfolio Categories: {{ucfirst($project_detail->Category->title)}}</div>
                </div>
                <div class="d-inline-flex my-2">
                    <div>Date: {{$project_detail->date}}</div>
                </div>
                <div class="d-inline-flex my-2">
                    <div>Status: {{$project_detail->status}}</div>
                </div>
            </div>
        </div>
        <div class="row pagination-container">
        @php
        $previous = '';
        $next = '';
        if(count($previous_next) == 2){
            $previous = $previous_next[0]->slug;
            $next = $previous_next[1]->slug;
        }
        if(count($previous_next) == 1){
            $previous = '';
            $next = $previous_next[0]->slug;
        }
        @endphp
            <div class="col">
                @if($previous != '')
                <a href="{{route('project', $previous)}}">
                    <div class="pagination-icon">
                        <i class="fa fa-angle-left"></i>
                    </div>
                </a>
                @endif
            </div>
            <div class="col align-middle">
                <a href="{{ route('projects') }}">
                    <div class="pagination-icon margin-auto">
                        <i class="fa fa-th"></i>
                    </div>
                </a>
            </div>
            <div class="col">
            <a href="{{route('project', $next)}}">
                    <div class="pagination-icon float-right">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection