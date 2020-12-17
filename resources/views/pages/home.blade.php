@extends('layouts.main')
 
@section('content')
<div class="slider-images-container">
    <div class="slider-object">
        <img class="slider-image" src="{{ asset('assets/images/temp/5.png') }}" alt= "image1"/>
        <div class="slider-overlay"></div>
        <div class="left-arrow"></div>
        <div class="right-arrow"></div>
        <div class="centered slider-title">
            <h1 data-animation="fadeIn" data-delay="0.5s" >Functionality</h1>
        </div>
        <div class="mouse-wrapper middle d-md-block">
            <div class="mouse">
                <div class="scroll"></div>
            </div>
        </div>
    </div>
    <div class="slider-object">
        <img class="slider-image" src="{{ asset('assets/images/temp/6.png') }}" alt= "image2"/>
        <div class="slider-overlay"></div>
        <div class="left-arrow"></div>
        <div class="right-arrow"></div>
        <div class="centered slider-title">
            <h1 data-animation="fadeIn" data-delay="0.5s">Practicality</h1>
        </div>
        <div class="mouse-wrapper middle d-md-block">
            <div class="mouse">
                <div class="scroll"></div>
            </div>
        </div>
    </div>
    <div class="slider-object">
        <img class="slider-image" src="{{ asset('assets/images/temp/7.png') }}" alt= "image3"/>
        <div class="slider-overlay"></div>
        <div class="left-arrow"></div>
        <div class="right-arrow"></div>
        <div class="centered slider-title">
            <h1 data-animation="fadeIn" data-delay="0.5s">A multidisciplinary design-build architectural firm</h1>
        </div>
        <div class="mouse-wrapper middle d-md-block">
            <div class="mouse">
                <div class="scroll"></div>
            </div>
        </div>
    </div>
    <div class="slider-object">
        <img class="slider-image" src="{{ asset('assets/images/temp/8.png') }}" alt= "image4"/>
        <div class="slider-overlay"></div>
        <div class="left-arrow"></div>
        <div class="right-arrow"></div>
        <div class="centered slider-title">
            <h1 data-animation="fadeIn" data-delay="0.5s">Iconic</h1>
        </div>
        <div class="mouse-wrapper middle d-md-block">
            <div class="mouse">
                <div class="scroll"></div>
            </div>
        </div>
    </div>
    <div class="slider-object">
        <img class="slider-image" src="{{ asset('assets/images/temp/9.png') }}" alt= "image5"/>
        <div class="slider-overlay"></div>
        <div class="left-arrow"></div>
        <div class="right-arrow"></div>
        <div class="centered slider-title">
            <h1 data-animation="fadeIn" data-delay="0.5s">Connecting with the landscape</h1>
        </div>
        <div class="mouse-wrapper middle d-md-block">
            <div class="mouse">
                <div class="scroll"></div>
            </div>
        </div>
    </div>
    <div class="slider-object">
        <img class="slider-image" src="{{ asset('assets/images/temp/11.png') }}" alt= "image6"/>
        <div class="slider-overlay"></div>
        <div class="left-arrow"></div>
        <div class="right-arrow"></div>
        <div class="centered slider-title">
            <h1 data-animation="fadeIn" data-delay="0.5s">Contrasting Textures</h1>
        </div>
        <div class="mouse-wrapper middle d-md-block">
            <div class="mouse">
                <div class="scroll"></div>
            </div>
        </div>
    </div>
</div>

@endsection 