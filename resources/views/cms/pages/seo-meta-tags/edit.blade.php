@extends('cms.layouts.main')

@section('content')
@include('cms.layouts.headers.partials', ['title' => 'Edit Record'])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">{{ $page_info['title'] }} <small>(The below info will be display on the Search Engines)</small></h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form method="post" action="{{ route('admin.'.$page_info['link'].'.update', $row) }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <div class="px-lg-4">
                            {{-- Title --}}
                            @include('cms.components.inputs.text', ['label' => 'Title', 'name' => 'title', 'maxlength' => 60])

                            {{-- Description --}}
                            @include('cms.components.inputs.text', ['label' => 'Description','name' => 'description', 'maxlength' => 160])

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('cms.layouts.footers.auth')
</div>
@endsection