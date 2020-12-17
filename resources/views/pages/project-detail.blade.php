@extends('layouts.main')
 
@section('content')
<div class="project-container-background">
    <div class="slider-project-images-container">
        <div class="slider-object">
            <img class="slider-image" src="{{ asset('assets/images/temp/5.png') }}" alt= "image1"/>
            <div class="left-arrow"></div>
            <div class="right-arrow"></div>
        </div>
        <div class="slider-object">
            <img class="slider-image" src="{{ asset('assets/images/temp/6.png') }}" alt= "image2"/>
            <div class="left-arrow"></div>
            <div class="right-arrow"></div>
        </div>
        <div class="slider-object">
            <img class="slider-image" src="{{ asset('assets/images/temp/7.png') }}" alt= "image3"/>
            <div class="left-arrow"></div>
            <div class="right-arrow"></div>
        </div>
        <div class="slider-object">
            <img class="slider-image" src="{{ asset('assets/images/temp/8.png') }}" alt= "image4"/>
            <div class="left-arrow"></div>
            <div class="right-arrow"></div>
        </div>
        <div class="slider-object">
            <img class="slider-image" src="{{ asset('assets/images/temp/9.png') }}" alt= "image5"/>
            <div class="left-arrow"></div>
            <div class="right-arrow"></div>
        </div>
        <div class="slider-object">
            <img class="slider-image" src="{{ asset('assets/images/temp/11.png') }}" alt= "image6"/>
            <div class="left-arrow"></div>
            <div class="right-arrow"></div>
        </div>
    </div>
    <div class="container">
        <h1 class="project-header-primary">El Darwish Villa at Al Khessa</h1>
        <div class="project-header-sub">
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <a href="" target="_blank" class="w-inline-block social-icon eye">
                        <div class="views mr-2"><i class="fa fa-eye mr-2 ml-2"></i>576 views</div>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=#url" target="_blank" class="mr-2 w-inline-block social-icon facebook">
                        <i class="fab fa-facebook-f mr-2 ml-2"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://twitter.com/intent/tweet" target="_blank" class="mr-2 w-inline-block social-icon twitter">
                        <i class="fab fa-twitter mr-2 ml-2"></i>
                    </a>
                    </li>
                <li class="list-inline-item no-border">
                    <a href="https://www.pinterest.com/pin/create/button/?url=http://iunuo.com/content/love-earth-0&media=/sites/default/files/2016-09/blog-post-9.jpg&description=" target="_blank" class="mr-2 w-inline-block social-icon pinterest">
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
                    <div>Description here</div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 project-details">
                <div class="detail-title">Project Details</div>
                <div class="d-inline-flex my-2">
                    <div>Client:</div>
                </div>
                <div class="d-inline-flex mt-1 mb-1">
                    <div>Portfolio Categories: Landscaping</div>
                </div>
                <div class="d-inline-flex my-2">
                    <div>Date: 10/12/12</div>
                </div>
                <div class="d-inline-flex my-2">
                    <div>Status: 10/12/12</div>
                </div>
            </div>
        </div>
        <div class="row pagination-container">
            <div class="col">
                <a href="">
                    <div class="pagination-icon">
                        <i class="fa fa-angle-left"></i>
                    </div>
                </a>
            </div>
            <div class="col align-middle">
                <a href="/dadaarchitecture/public/projects">
                    <div class="pagination-icon margin-auto">
                        <i class="fa fa-th"></i>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="">
                    <div class="pagination-icon float-right">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection