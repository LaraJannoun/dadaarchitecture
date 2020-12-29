@extends('cms.layouts.main')

@section('content')
@include('cms.layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row mt-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">{{ $page_info['title'] }}</h3>
                        </div>
                        <div class="col-auto text-right">
                            <a href="{{ route('admin.'.$page_info['link'].'.create') }}" class="btn btn-sm btn-primary">Add</a>
                            <a href="{{ route('admin.'.$page_info['link'].'.order') }}" class="btn btn-sm btn-warning">Order</a>
                        </div>
                    </div>
                </div>

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

                <table class="table align-items-center table-flush datatable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Slug</th>
                            <th scope="col">Country</th>
                            <th scope="col" title="make sure to enter a / if you have many values">Value</th>
                            <th scope="col" title="make sure to enter a / if you have many values">Link</th>
                            <th scope="col" class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                        <tr>
                            <td>{{ $row->slug }}</td>
                            <td>{{ $row->country }}</td>
                            <td title="make sure to enter a / if you have many values">{{ $row->value }}</td>
                            <td title="make sure to enter a / if you have many values">{{ $row->link }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('admin.'.$page_info['link'].'.show', $row) }}">View</a>
                                        <a class="dropdown-item" href="{{ route('admin.'.$page_info['link'].'.edit', $row) }}">Edit</a>
                                        <form action="{{ route('admin.'.$page_info['link'].'.destroy', $row) }}" method="post">
                                        @csrf
                                        @method('delete') 
                                            <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete this record?') ? this.parentElement.submit() : ''">
                                                Delete
                                            </button> 
                                        </form> 
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('cms.layouts.footers.auth')
</div>
@endsection
