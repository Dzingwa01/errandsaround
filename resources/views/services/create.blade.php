@extends('layouts.app', ['title' => __('Services Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Service')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Service Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('service.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('service.store') }}" enctype="multipart/form-data" autocomplete="on">
                            @csrf
                            <h6 style="text-transform: uppercase;" class="heading-small text-muted mb-4">{{ __('Service information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('service_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Service Name') }}</label>
                                    <input type="text" name="service_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('service_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Service Name') }}" value="{{ old('service_name') }}" required autofocus>

                                    @if ($errors->has('service_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('service_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('service_description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="service-description">{{ __('Service Description') }}</label>
                                    <textarea name="service_description" id="service-description" class="form-control form-control-alternative{{ $errors->has('service_description') ? ' is-invalid' : '' }}" placeholder="{{ __('Service Description') }}" >{{ old('service_description') }}</textarea>
                                    @if ($errors->has('service_description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('service_description') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-service-price">{{ __('Service Price') }}</label>
                                    <input type="number" step="0.01" name="price" id="input-service-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Service Price') }}" value="{{ old('price') }}" required autofocus>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 col-sm-12">
                                        <img src="" id="previewing">
                                        <div class="file-field input-field" style="bottom:0px!important;">
                                            <label for="service_image_url" class="form-control-label">Upload Service
                                                Image</label>
                                            <input id="service_image_url" name="service_image_url" class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @push('custom-scripts')
            <script>
                $(document).ready(function () {
                        $(function () {
                            $("#service_image_url").change(function () {
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
                                }
                            });
                        });

                        function imageIsLoaded(e) {
                            $("#profile_picture_url").css("color", "green");
                            $('#previewing').css("display", "block");
                            $('#previewing').attr('src', e.target.result);
                            $('#previewing').attr('width', '100%');
                            $('#previewing').attr('height', '100%');
                        }
                    });
            </script>
        @endpush
            @include('layouts.footers.auth')
    </div>
@endsection