@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Agent')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('save-user') }}" autocomplete="on">
                            @csrf
                            <h6 style="text-transform: uppercase;" class="heading-small text-muted mb-4">{{ __('Client information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Client Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-surname">{{ __('Surname') }}</label>
                                    <input type="text" name="surname" id="input-surname" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Surname') }}" value="{{ old('surname') }}"  required autofocus>

                                    @if ($errors->has('surname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Client Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('contact_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-contact_number">{{ __('Contact Number') }}</label>
                                    <input type="tel" name="contact_number" id="input-contact_number" class="form-control form-control-alternative{{ $errors->has('contact_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Contact Number') }}"  required>

                                    @if ($errors->has('contact_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('contact_number') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-address">{{ __('Client Physical Address') }}</label>
                                    <textarea name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" >{{ old('email') }}</textarea>
                                </div>
                                {{--<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">--}}
                                    {{--<label class="form-control-label" for="input-password">{{ __('Password') }}</label>--}}
                                    {{--<input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" required>--}}
                                    {{----}}
                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                            {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>--}}
                                    {{--<input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="" required>--}}
                                {{--</div>--}}

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection