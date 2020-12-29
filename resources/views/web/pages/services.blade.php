@extends('web.layouts.main')
 
@section('content')
<div class="container-background services-container">
    <div class="services-container-banner" style="background-image:url({{$banner->image}})"></div>
    <div class="container">
        <div class="text-center">
            DADA Design & Architecture provides a comprehensive range of design-build services including architecture, interior design, landscape design, and contracting.
        </div>
        <div class="text-center images-container">
            <h2 class="page-sub-title">WE ARE BEST IN</h2>
            <img src="{{ asset('assets_web/images/title-line.png') }}"/>
        </div>
        <div class="container">
            <div class="row mb-5 scroll-animations">
                @foreach($services as $service)
                <div class="col-sm-1 col-md-6 animated animate__delay-3s">
                    <h4 class="services-title">{{$service->title}}</h4>
                    <p class="mb-5">{{$service->description}}<p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="services-clients-background">
        <div class="row">
            <h2 class="margin-auto text-bold mt-5 mb-5 page-sub-title">We Deal With</h2>
        </div>
        <div class="container">
            <div class="row scroll-animations">
                @foreach($clients as $client)
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <img class="client-image animated animate__delay-3s" src="{{ asset($client->image) }}" alt="{{$client->title}}"/>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection