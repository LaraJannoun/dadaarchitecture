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
                            <form action="{{ route('admin.'.$page_info['link'].'.bulk_delete') }}" method="post" class="d-inline-block">
                                @csrf

                                <input type="hidden" name="bulk-delete">
                                <button type="submit" class="btn btn-sm btn-danger btn-bulk-delete-js" onclick="confirm('Are you sure you want to delete the selected record(s)?') ? this.parentElement.submit() : ''">Bulk delete</button>
                            </form>
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
                            <th scope="col" class="no-sort"></th>
                            <th scope="col">Slug</th>
                            <th scope="col" class="no-sort">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Client</th>
                            <th scope="col">Status</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="no-sort">Publish</th>
                            <th scope="col" class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                        <tr>
                            <td class="adjust-element pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="id[]" class="custom-control-input bulk-delete-js" id="delete-bulk-{{ $row->id }}" value="{{ $row->id }}">
                                    <label class="custom-control-label" for="delete-bulk-{{ $row->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $row->slug }}</td>
                            <td><img src="{{ asset($row->main_image) }}" class="img-thumbnail"></td>
                            <td>{{ substr($row->title, 0, 20) }}...</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->client }}</td>
                            <td>{{ $row->status }}</td>
                            <td>{{ $row->Category->title }}</td>
                            <td>{{ date('d M Y', strtotime($row->date)) }}</td>
                            <td class="adjust-element">
                                <label class="custom-toggle mb-0">
                                    <input class="publish-js" type="checkbox" value="{{ $row->id }}" @if($row->publish) {{ "checked" }} @endif>
                                    <span class="custom-toggle-slider rounded-circle"></span>
                                </label>
                            </td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <form action="{{ route('admin.'.$page_info['link'].'.destroy', $row) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a class="dropdown-item" href="{{ route('admin.'.$page_info['link'].'.show', $row) }}">View</a>
                                            <a class="dropdown-item" href="{{ route('admin.'.$page_info['link'].'.edit', $row) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('admin.'.$page_info['link'].'.replicate', $row) }}">Replicate</a>
                                            <button type="button" class="dropdown-item cursor-pointer" onclick="confirm('Are you sure you want to delete this record?') ? this.parentElement.submit() : ''">
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

@push('script')
<script type="text/javascript">

    $(".btn-bulk-delete-js").click(function () {
        var ids = [];
        $(".bulk-delete-js").each(function () {
            if ($(this).is(":checked")) {
                ids.push($(this).val());
            }
        });
        $('input[name="bulk-delete"]').val(ids);
    });

    $('.publish-js').change(function(){
        var $this = $(this);

        $.ajax({
            type: "post",
            url: "{{ route('admin.'.$page_info['link'].'.publish') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $this.val()
            }
        });
    });

</script>
@endpush