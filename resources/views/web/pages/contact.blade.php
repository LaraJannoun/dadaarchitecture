@extends('web.layouts.main')
 
@section('content')
<div class="container-background contact-container mobile-container">
    <div class="text-center pb-5">
        <h2 class="page-title">CONTACT US</h2>
        <h6 class="secondary-color page-description">We'd love to hear from you.<h5>
        <img src="{{ asset('assets_web/images/title-line.png') }}"/>
    </div>
    <div class="container">
        @if(session('status'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div id="map"></div>
        <form  action="{{Route('contact.submit')}}" method="POST">
            @csrf
            <div class="row mt-5 mb-3">
                <div class="col-sm-4 mb-4 mb-sm-0 mb-4 mb-sm-0">
                    <label>Name:</label>
                    <input name="full_name" class="contact-input" placeholder="Anonymous" type="text"/>
                </div>
                <div class="col-sm-4 mb-4 mb-sm-0">
                    <label>Email Address:</label>
                    <input name="email" class="contact-input" placeholder="Enter your email address" type="text"/>
                    @if($errors->has('email'))
                    <span class="invalid-feedback text-danger d-block" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-sm-4 mb-4 mb-sm-0">
                    <label>Subject:</label>
                    <input name="subject" class="contact-input" placeholder="Enter your subject" type="text"/>
                    @if($errors->has('subject'))
                    <span class="invalid-feedback text-danger d-block" role="alert">
                        <strong>{{ $errors->first('subject') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Message:</label>
                    <textarea name="message" rows="4" class="contact-input message" placeholder="Your message here.."></textarea>
                    @if($errors->has('message'))
                    <span class="invalid-feedback text-danger d-block" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="row m-0 my-3">
                <button class="submit-button" type="submit">Submit</button>
            </div>
        </form>

    </div>
</div>
@endsection

@push('script')
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly" defer></script>
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        const location = { lat: {{$lat->value}}, lng: {{$lng->value}} };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: location,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: location,
            map: map,
        });
    }
</script>
@endpush