@extends('web.layouts.main')
 
@section('content')
<div class="container-background profile-container">
    <div class="banner align-middle" style="background-image:url({{$banner->image}})">
        <div class="banner-title">{{$banner->title}}</div>
    </div>

    <div class="ml-3 mr-3">
        @foreach($profile_detail as $pd)
        <div class="profile-text">
            <h6 class="mb-lg-3 text-underline text-bold">{{$pd->title}}</h6>
            <div>{{$pd->description}}</div>
        </div>
        @endforeach
    </div>
    <div>
        <div class="text-center images-container">
            <h2 class="page-sub-title">THE DESIGNERS WE LOVE</h2>
            <img src="{{ asset('assets_web/images/title-line.png') }}"/>
        </div>
        <div class="row ml-md-5">
            @foreach($designers as $designer)
            <div class="col-sm-6 col-md-5 col-lg-4 profile">
                <img class="team-image" src="{{ asset($designer->image) }}"  alt="{{$designer->name}}">
                <div class="team-overlay">
                    <div class="team-text">
                        <h6 class="team-name mb-3">{{$designer->name}}</h6>
                        <div class="team-title">{{$designer->title}}</div>
                        <div class="text-center mt-4">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-lg-4"><a target="_blank" class="w-inline-block social-icon facebook" href="{{$designer->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item mr-lg-4"><a target="_blank" class="w-inline-block social-icon instagram" href="{{$designer->instagram_link}}" ><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
            

