@extends('cms.layouts.main')

@section('content')
@include('cms.layouts.headers.partials', ['title' => 'Settings'])

<div class="container-fluid mt--7">
    <div class="card shadow">
        <div class="card-body">
            <ul class="list-unstyled m-0">
                <li>
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="mb-0"><b>Maintenance Mode</b></p>
                        </div>
                        <div class="col-auto adjust-element">
                            <label class="custom-toggle mb-0">
                                <input class="maintenance-js" type="checkbox" value="{{ $settings->maintenance_mode }}" @if($settings->maintenance_mode) {{ "checked" }} @endif>
                                <span class="custom-toggle-slider rounded-circle"></span>
                            </label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    @include('cms.layouts.footers.auth')
</div>
@endsection

@push('script')
<script type="text/javascript">

    $('.maintenance-js').change(function(){
        var $this = $(this);

        $.ajax({
            type: "post",
            url: "{{ route('admin.settings.maintenance') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $this.val()
            }
        });
    });

</script>
@endpush