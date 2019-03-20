@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => auth()->user()->name .' '. auth()->user()->surname
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img id="previewing" onclick="$('#profile_picture_url').trigger('click'); return true;" alt="Image placeholder" src="{{!is_null(\Illuminate\Support\Facades\Auth::user()->profile_picture_url)?'/storage/'.\Illuminate\Support\Facades\Auth::user()->profile_picture_url:'/img/profile_placeholder.jpg'}}">
                                </a>
                            </div>
                            <input id="profile_picture_url" hidden type="file">
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        {{--<div class="d-flex justify-content-between">--}}
                            {{--<a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>--}}
                            {{--<a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>--}}
                        {{--</div>--}}
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    {{--<div>--}}
                                        {{--<span class="heading">22</span>--}}
                                        {{--<span class="description">{{ __('Friends') }}</span>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}
                                        {{--<span class="heading">10</span>--}}
                                        {{--<span class="description">{{ __('Photos') }}</span>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}
                                        {{--<span class="heading">89</span>--}}
                                        {{--<span class="description">{{ __('Comments') }}</span>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name .' '. auth()->user()->surname}}
                            </h3>

                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('App Adminstrator') }}
                            </div>
                            {{--<div>--}}
                                {{--<i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}--}}
                            {{--</div>--}}
                            {{--<hr class="my-4" />--}}
                            {{--<p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>--}}
                            {{--<a href="#">{{ __('Show more') }}</a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-surname">{{ __('Surname') }}</label>
                                    <input type="text" name="surname" id="input-surname" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Surname') }}" value="{{ old('surname', auth()->user()->surname) }}" required autofocus>

                                    @if ($errors->has('surname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input name="email" value="{{auth()->user()->email}}" hidden>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email"  disabled="disabled" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('contact_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-contact_number">{{ __('Contact Number') }}</label>
                                    <input type="tel" name="contact_number" id="input-contact_number" class="form-control form-control-alternative{{ $errors->has('contact_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Contact Number') }}" value="{{ old('contact_number', auth()->user()->contact_number) }}" required>

                                    @if ($errors->has('contact_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('contact_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
                                    <textarea name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}">{{auth()->user()->address}}</textarea>


                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @push('custom-scripts')
            <script>
                $(document).ready(function(){
                    $(function () {
                        $("#profile_picture_url").change(function () {
                            $("#message").empty(); // To remove the previous error message
                            var file = this.files[0];
                            var imagefile = file.type;
                            var match = ["image/jpeg", "image/png", "image/jpg"];
                            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                                $('#previewing').attr('src', 'noimage.png');
                                $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                                return false;
                            } else {
                                var reader = new FileReader();
                                reader.onload = imageIsLoaded;
                                reader.readAsDataURL(this.files[0]);
                                updateProfilePic();
                            }
                        });
                    });

                    function imageIsLoaded(e) {
                        $("#profile_picture_url").css("color", "green");
                        $('#previewing').css("display", "block");
                        $('#previewing').attr('src', e.target.result);
                        $('#previewing').attr('width', '200px');
                        $('#previewing').attr('height', '200px');
                    }
                });

                function updateProfilePic(){
                    let user = {!! auth()->user() !!};

                    let formData = new FormData();
                    formData.append('name', user.name);
                    formData.append('surname', user.surname);
                    formData.append('email', user.email);
                    formData.append('contact_number', user.contact_number);
                    formData.append('address', user.address);

                    jQuery.each(jQuery('#profile_picture_url')[0].files, function (i, file) {
                        formData.append('profile_picture_url', file);
                    });

                        $.ajax({
                            url: "/profile-update/"+user.id,
                            processData: false,
                            contentType: false,
                            data: formData,
                            type: 'post',
                            success: function (response, a, b) {
                                console.log("success", response);
                                alert(response.message);
                                window.location.reload();
                            },
                            error: function (response) {
                                console.log("error", response);
                                let message = response.responseJSON.message;
                                console.log("error", message);
                                let errors = response.responseJSON.errors;

                                for (var error in   errors) {
                                    console.log("error", error)
                                    if (errors.hasOwnProperty(error)) {
                                        message += errors[error] + "\n";
                                    }
                                }
                                alert(message);
                            }

                    });
                }
            </script>
            @endpush
        @include('layouts.footers.auth')
    </div>
@endsection