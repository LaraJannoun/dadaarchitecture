@extends('web.layouts.main')
 
@section('content')
<div class="slider-images-container">
    @foreach($home_sliders as $home_slider)
    <div class="slider-object">
        <img class="slider-image" src="{{ asset($home_slider->image) }}" alt="{{$home_slider->title}}"/>
        <div class="slider-overlay"></div>
        <div class="left-arrow"></div>
        <div class="right-arrow"></div>
        <div class="centered slider-title">
            <h1 data-animation="fadeIn" data-delay="0.5s">{{$home_slider->title}}</h1>
        </div>
        <div class="mouse-wrapper middle d-md-block">
            <div class="mouse">
                <div class="scroll"></div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection 