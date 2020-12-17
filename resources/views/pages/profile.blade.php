@extends('layouts.main')
 
@section('content')
<div class="container-background profile-container">
    <div class="banner align-middle">
        <div class="banner-title">OUR PROFILE</div>
    </div>

    <div class="ml-3 mr-3">
        <div class="profile-text">
            <h6 class="mb-lg-3 text-underline text-bold">Company</h6>
            <div>DADA Design and Architecture is a design-build architectural company with offices in Beirut and Doha. We were founded in 2008 by Marc El Dada and Mario El Dada who sought to offer full-scale inclusive contracting services with specialities in interiors and landscaping.</div>
            <div>We are renowned throughout the region for working on prestigious projects, including luxury residential and large-scale commercial projects. Our advanced engineering skills, architectural design talents, and dedication to accuracy, precision and project execution allow us to work with highly reputable clients in Qatar, Lebanon and GCC countries.</div>
        </div>
        <div class="profile-text">
            <h6 class="mb-lg-3 text-underline text-bold">Philosophy</h6>
            <div class="">Everything we do is about creating the perfect structures and spaces for our clients and society as a whole. We’re dedicated to planning, developing and building interior and exterior environments which are both highly functional and aesthetically pleasing, based on the client’s lifestyle and tastes.</div>
            <div>All our team at DADA love what they do and are committed to core philosophical pillars that make our firm so successful and respected. These include dedication to conceptual integrity, attention to detail, passion for sustainability, adherence to manageability, and above all, a commitment to reliability and durability.</div>
            <div>Every project we work on begins with a conversation. A core ethos of our company is working closely with our clients to ensure we meet their exact goals and deliver results that match their vision.</div>
        </div>
        <div class="profile-text">
            <h6 class="mb-lg-3 text-underline text-bold">TEAM</h6>
            <div>We are a multidisciplinary design-build architectural firm. Our staff include architects, interior designers, landscape architects, structural engineers, mechanical engineers, civil engineers, quantity surveyors, accountants, draftsmen, and more. All these skillsets are brought together through a seamless project management system.</div>
            <div>We only hire and work with the best professionals in their particular field so as to ensure our clients receive services of the highest standards. Our respected reputation depends on it and it’s why we’re trusted with some of the largest building projects in the region.</div>
        </div>
    </div>
    <div>
        <div class="text-center images-container">
            <h2 class="page-sub-title">THE DESIGNERS WE LOVE</h2>
            <img src="{{ asset('assets/images/title-line.png') }}"/>
        </div>
        <div class="row ml-md-5">
            <div class="col-sm-6 col-md-5 col-lg-4 profile">
                <img class="team-image" src="{{ asset('assets/images/Marc.png') }}" alt="Marc El Dada">
                <div class="team-overlay">
                    <div class="team-text">
                        <h6 class="team-name mb-3">Marc El Dada</h6>
                        <div class="team-title">Owner . Designer Director</div>
                        <div class="text-center mt-4">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-lg-4"><a target="_blank" class="w-inline-block social-icon facebook" href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item mr-lg-4"><a target="_blank" class="w-inline-block social-icon instagram" href="" ><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 profile">
                <img class="team-image" src="{{ asset('assets/images/mario.png') }}" alt="Mario El Dada">
                <div class="team-overlay">
                    <div class="team-text">
                        <h6 class="mb-3 team-name">Mario El Dada</h6>
                        <div class="team-title">GM . Landscape Architect</div>
                        <div class="text-center mt-4">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-lg-4"><a target="_blank" class="w-inline-block social-icon facebook" href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item mr-lg-4"><a target="_blank" class="w-inline-block social-icon instagram" href="" ><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
            

