@extends('cms.layouts.main')

@section('content')
@include('cms.layouts.headers.partials', ['title' => 'Add Record'])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">{{ $page_info['title'] }}</h3>
                        </div>
                        <div class="col-auto text-right">
                            <a href="{{ route('admin.'.$page_info['link'].'.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.'.$page_info['link'].'.store') }}" autocomplete="off">
                        @csrf
                        <div class="px-lg-4">
                            {{-- Slug --}}
                            @include('cms.components.inputs.text', ['label' => 'Slug', 'asterix' => true, 'name' => 'slug'])

                            {{-- Country --}}
                            @include('cms.components.inputs.text', ['label' => 'Country', 'name' => 'country'])

                            {{-- Value --}}
                            @include('cms.components.inputs.text', ['label' => 'Value', 'name' => 'value', 'tooltip' => 'make sure to enter a / if you have many values'])

                            {{-- Link --}}
                            @include('cms.components.inputs.text', ['label' => 'Link', 'name' => 'link', 'tooltip' => 'make sure to enter a / if you have many values'])

                            {{-- Order --}}
                            @include('cms.components.inputs.number', ['label' => 'Order', 'name' => 'pos'])
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