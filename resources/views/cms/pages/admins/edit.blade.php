@extends('cms.layouts.main')

@section('content')
@include('cms.layouts.headers.partials', ['title' => 'Edit Record'])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ $page_info['title'] }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('admin.'.$page_info['link'].'.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.'.$page_info['link'].'.update', $admin) }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <div class="pl-lg-4">
                            {{-- First Name --}}
                            <div class="form-group">
                                <label class="form-control-label" for="input-first_name">First Name <span class="text-danger">*</span></label>
                                <input name="first_name" id="input-first_name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="First Name" value="{{ old('first_name', $admin->first_name) }}" autofocus>

                                @if($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>

                            {{-- Last Name --}}
                            <div class="form-group">
                                <label class="form-control-label" for="input-last_name">Last Name <span class="text-danger">*</span></label>
                                <input name="last_name" id="input-last_name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Last Name" value="{{ old('last_name', $admin->last_name) }}">

                                @if($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>

                            {{-- Email --}}
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email <span class="text-danger">*</span></label>
                                <input name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email', $admin->email) }}">

                                @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            {{-- Password --}}
                            <div class="form-group">
                                <label class="form-control-label" for="input-password">Password <span class="text-danger">*</span></label>
                                <input name="password" type="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" value="">

                                @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            {{-- Confirm Password --}}
                            <div class="form-group">
                                <label class="form-control-label" for="input-password-confirmation">Confirm Password</label>
                                <input name="password_confirmation" type="password" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Confirm Password" value="">
                            </div>
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