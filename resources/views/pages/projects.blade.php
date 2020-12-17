@extends('layouts.main')
 
@section('content')
<div class="project-container-background mobile-container">
    <div class="text-center">
        <h2 class="page-title">OUR PROJECTS</h2>
        <h6 class="secondary-color page-description">What we've done and more projects, structural engineering, city urbanism and more.<h5>
        <img src="{{ asset('assets/images/title-line.png') }}"/>
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
                    <div class="secondary-button filter" data-filter="interiors">Interiors</div>
                    <div class="secondary-button filter" data-filter="architecture">Architecture</div>
                    <div class="secondary-button filter" data-filter="landscape">Landscaping</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end buttons -->
    <div class="grid">
        <div class="grid-sizer"></div>
        <div class="grid-item first-image">
            <img class="first" src="{{ asset('assets/images/first_proj.png') }}" alt="tri">
        </div>
        <div class="grid-item image-container architecture">
            <a href="/dadaarchitecture/public/projects/1">
                <img class="project-image" src="{{ asset('assets/images/temp/Thumbnail2.png') }}" alt="Private Villa Lebanon">
                <div class="project-desc pl-3">
                    <h6 class="text-bold pt-3">El Darwish Villa at Al Khessa</h6>   
                    <p>Architecture</p>
                </div>
            </a>
        </div>
        <div class="grid-item image-container landscape">
            <a href="/dadaarchitecture/public/projects/1">
                <img class="project-image" src="{{ asset('assets/images/temp/asset-9.png') }}" alt="Lanoir Shop at Pearl">
                <div class="project-desc pl-3">
                    <h6 class="text-bold pt-3">Lanoir Shop at Pearl</h6>   
                    <p>Architecture</p>
                </div>
            </a>
        </div>
        <div class="grid-item image-container interiors">
            <a href="/dadaarchitecture/public/projects/1">
                <img class="project-image" src="{{ asset('assets/images/temp/asset-2.png') }}" alt="Private Loft Lebanon">
                <div class="project-desc pl-3">
                    <h6 class="text-bold pt-3">Private Loft Lebanon</h6>   
                    <p>Architecture</p>
                </div>
            </a>
        </div>
        <div class="grid-item image-container architecture">
            <a href="/dadaarchitecture/public/projects/1">
                <img class="project-image" src="{{ asset('assets/images/temp/asset-3.png') }}" alt="Private Villa Lebanon">
                <div class="project-desc pl-3">
                    <h6 class="text-bold pt-3">Private Villa Lebanon</h6>   
                    <p>Architecture</p>
                </div>
            </a>
        </div>
        <div class="grid-item image-container architecture">
            <a href="/dadaarchitecture/public/projects/1">
                <img class="project-image" src="{{ asset('assets/images/temp/asset-4.png') }}" alt="Private Villa Lebanon">
                <div class="project-desc pl-3">
                    <h6 class="text-bold pt-3">Private Villa Lebanon</h6>   
                    <p>Architecture</p>
                </div>
            </a>
        </div>
        <div class="grid-item image-container architecture">
            <a href="/dadaarchitecture/public/projects/1">
                <img class="project-image" src="{{ asset('assets/images/temp/asset-5.png') }}" alt="Private Villa Lebanon">
                <div class="project-desc pl-3">
                    <h6 class="text-bold pt-3">Private Villa Lebanon</h6>   
                    <p>Architecture</p>
                </div>
            </a>
        </div>
        <div class="grid-item image-container interiors">
            <a href="/dadaarchitecture/public/projects/1">
                <img class="project-image" src="{{ asset('assets/images/temp/asset-6.png') }}" alt="Private Villa Lebanon">
                <div class="project-desc pl-3">
                    <h6 class="text-bold pt-3">Private Villa Lebanon</h6>   
                    <p>Architecture</p>
                </div>
            </a>
        </div>
        <div class="grid-item image-container landscape">
            <a href="/dadaarchitecture/public/projects/1">
                <img class="project-image" src="{{ asset('assets/images/temp/asset-7.png') }}" alt="Private Villa Lebanon">
                <div class="project-desc pl-3">
                    <h6 class="text-bold pt-3">Private Villa Lebanon</h6>   
                    <p>Architecture</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
