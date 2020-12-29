@extends('cms.layouts.main')

@section('content')
@include('cms.layouts.headers.partials', ['title' => 'Hello' . ' ' . Auth::guard('admin')->user()->first_name, 'description' => 'This is your profile page.'])

<div class="container-fluid mt--7">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="col-12 mb-0">Edit Profile</h3>
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

            @if(session('password_status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('password_status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <form method="post" action="{{ route('admin.profile.update') }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">User information</h6>

                        {{-- First Name --}}
                        <div class="form-group">
                            <label class="form-control-label" for="input-first_name">First Name</label>
                            <input name="first_name" id="input-first_name" class="form-control form-control-alternative {{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="First Name" value="{{ old('first_name', Auth::guard('admin')->user()->first_name) }}" autofocus>

                            @if($errors->has('first_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                            @endif
                        </div>

                        {{-- Last Name --}}
                        <div class="form-group">
                            <label class="form-control-label" for="input-last_name">Last Name</label>
                            <input name="last_name" id="input-last_name" class="form-control form-control-alternative {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Last Name" value="{{ old('last_name', Auth::guard('admin')->user()->last_name) }}">

                            @if($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                            @endif
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Email</label>
                            <input name="email" id="input-email" class="form-control form-control-alternative {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email', Auth::guard('admin')->user()->email) }}">

                            @if($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="post" action="{{ route('admin.profile.password') }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">Password</h6>

                        {{-- Current Password --}}
                        <div class="form-group">
                            <label class="form-control-label" for="input-current-password">Current Password</label>
                            <input name="old_password" type="password" id="input-current-password" class="form-control form-control-alternative {{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="Current Password" value="">

                            @if($errors->has('old_password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                            @endif
                        </div>

                        {{-- New Password --}}
                        <div class="form-group">
                            <label class="form-control-label" for="input-password">New Password</label>
                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" value="">

                            @if($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        {{-- Confirm New Password --}}
                        <div class="form-group">
                            <label class="form-control-label" for="input-password-confirmation">Confirm New Password</label>
                            <input name="password_confirmation" type="password" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Confirm New Password" value="">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">Change password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('cms.layouts.footers.auth')
</div>
@endsection