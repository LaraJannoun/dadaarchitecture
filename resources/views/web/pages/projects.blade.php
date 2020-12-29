@extends('web.layouts.main')
 
@section('content')
<div class="project-container-background mobile-container">
    <div class="text-center">
        <h2 class="page-title">OUR PROJECTS</h2>
        <h6 class="secondary-color page-description">What we've done and more projects, structural engineering, city urbanism and more.<h5>
        <img src="{{ asset('assets_web/images/title-line.png') }}"/>
    </div>
    <div class="container">
        <!-- buttons -->
        <div class="filter-button-container">
            <div class="primary-button show-filter-button">
                <i class="fas fa-filter"></i>
                Show Filter
            </div>
            <div class="primary-button hide-filter-button">
                <i class="fas fa-filter"></i>
                Hide Filter
            </div>
            <div class="filter-buttons">
                <div class="filter-buttons-responsive">     
                <div class="secondary-button filter" data-filter="*">All</div>
                @foreach($categories as $category)
                <div class="secondary-button filter" data-filter="{{$category->title}}">{{ucfirst($category->title)}}</div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- end buttons -->
    <div class="grid">
        <div class="grid-sizer"></div>
        <div class="grid-item first-image">
            <img class="first" src="{{ asset('assets_web/images/first_proj.png') }}" alt="dada-triangle">
        </div>
        @foreach($projects as $project)
        <div class="grid-item image-container {{$project->Category->title}}">
            <a href="{{ route('project', $project->slug) }}">
                <img class="project-image" src="{{ asset($project->main_image) }}" alt="{{$project->title}}">
                <div class="project-desc pl-3">
                    <h6 class="text-bold pt-3">{{$project->title}}</h6>   
                    <p>{{ucfirst($project->Category->title)}}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
