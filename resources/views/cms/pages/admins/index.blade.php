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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="no-sort">Blocked</th>
                            <th scope="col">Created At</th>
                            <th scope="col" class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                        <tr>
                            <td>
                                <span class="badge badge-dot">
                                    <i class="bg-success"></i>
                                </span>
                                {{ $admin->first_name . ' ' . $admin->last_name }}
                            </td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ date('d M Y - h:i A', strtotime($admin->created_at)) }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        {{-- Admin can not edit himself redirect to profile page --}}
                                            <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Edit</a>
                                        {{-- Admin can not delete himself --}}
                                        @if(Auth::guard('admin')->user()->id != $admin->id)
                                            <form action="{{ route('admin.'.$page_info['link'].'.destroy', $admin) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete this admin?') ? this.parentElement.submit() : ''">
                                                    Delete
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.'.$page_info['link'].'.destroy', $admin) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete this admin?') ? this.parentElement.submit() : ''">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
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

@push('js')
<script type="text/javascript">

    $('.block-js').change(function(){
        var $this = $(this);

        $.ajax({
            type: "post",
            url: "{{ route('admin.'.$page_info['link'].'.block') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $this.val()
            },
            success: function(data){

                if(data.data == 1){
                    $this.closest("tr").find(".badge-dot i").removeClass("bg-success").addClass("bg-danger");
                } else {
                    $this.closest("tr").find(".badge-dot i").removeClass("bg-danger").addClass("bg-success");
                }

            }
        });

    });

</script>
@endpush