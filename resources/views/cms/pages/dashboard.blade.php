@extends('cms.layouts.main')

@section('content')
@include('cms.layouts.headers.cards')

<div class="container-fluid mt--7">
	<div class="card text-center shadow overflow-hidden mb-5">
		<div class="card-header border-0">
			<h1 class="mb-0">Welcome <b>{{ Auth::guard('admin')->user()->first_name }}</b> to {{ env('APP_NAME') }} dashboard</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 mb-4">
			<div class="card card-stats h-100">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Published Projects</h5>
							<span class="h2 font-weight-bold mb-0">{{ $projects_published }}</span>
						</div>
						<div class="col-auto">
							<a href="{{ route('admin.projects.index') }}">
								<div class="icon icon-shape bg-primary text-white rounded-circle shadow">
									<i class="fas fa-newspaper"></i>
								</div>
							</a>
						</div>
					</div>
					@if($projects_published < 10)
					<p class="mt-3 mb-0 text-muted text-sm">
						<span class="text-nowrap">Keep Going!</span>
					</p>
					@elseif($projects_published >= 10 && $projects_published < 25)
					<p class="mt-3 mb-0 text-muted text-sm">
						<span class="text-nowrap">Great! Don't stop.</span>
					</p>
					@elseif($projects_published >= 25)
					<p class="mt-3 mb-0 text-muted text-sm">
						<span class="text-nowrap">Excellent Work!</span>
					</p>
					@endif
				</div>
			</div>
		</div>
		<div class="col-lg-4 mb-4">
			<div class="card card-stats h-100">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Unpublished Projects</h5>
							<span class="h2 font-weight-bold mb-0">{{ $projects_unpublished }}</span>
						</div>
						<div class="col-auto">
							<a href="{{ route('admin.projects.index') }}">
								<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
									<i class="fas fa-newspaper"></i>
								</div>
							</a>
						</div>
					</div>
					@if($projects_unpublished == 0)
					<p class="mt-3 mb-0 text-muted text-sm">
						<span class="text-nowrap">Great Job!</span>
					</p>
					@elseif($projects_published >= 1)
					<p class="mt-3 mb-0 text-muted text-sm">
						<span class="text-nowrap">Attention you have unpublished works!</span>
					</p>
					@endif
				</div>
			</div>
		</div>
	</div>

	@include('cms.layouts.footers.auth')
</div>
@endsection

@push('script')
<script type="text/javascript" src="{{ asset('assets_cms/libraries/chartjs/chart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets_cms/libraries/chartjs/chart.extension.js') }}"></script>
@endpush