@extends('layouts.main')
 
@section('content')
<div class="container-background contact-container mobile-container">
    <div class="text-center pb-5">
        <h2 class="page-title">CONTACT US</h2>
        <h6 class="secondary-color page-description">We'd love to hear from you.<h5>
        <img src="{{ asset('assets/images/title-line.png') }}"/>
    </div>
    
    <div class="container">
        <div id="map"></div>
        <div class="row mt-5 mb-3">
            <div class="col-sm-4 mb-4 mb-sm-0 mb-4 mb-sm-0">
                <label>Name:</label>
                <input class="contact-input" placeholder="Anonymous" type="text" required/>
            </div>
            <div class="col-sm-4 mb-4 mb-sm-0">
                <label>Email Address:</label>
                <input class="contact-input" placeholder="Enter your email address" type="text" required/>
            </div>
            <div class="col-sm-4 mb-4 mb-sm-0">
                <label>Subject:</label>
                <input class="contact-input" placeholder="Enter your subject" type="text" required/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Message:</label>
                <textarea name="message" rows="4" class="contact-input message" placeholder="Your message here.."></textarea>
            </div>
        </div>
        <div class="row m-0 my-3">
            <button class="submit-button" type="submit">Submit</button>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly" defer></script>
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        const location = { lat: 33.8909517, lng: 35.4762611 };
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