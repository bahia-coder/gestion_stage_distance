@extends('layouts.master')

@section('title', 'Home')

@section('content')
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Settings') }}</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="{{ route('settings.update', 'test') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="societe_name" class="col-md-4 col-form-label text-md-right">{{ __('Societe Name') }}<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input id="societe_name" type="text" class="form-control" name="societe_name" value="{{ $setting['societe_name'] }}" required autofocus placeholder="Name of societe">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="current_session" class="col-md-4 col-form-label text-md-right">{{ __('Current Year') }}<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <select id="current_session" class="form-control" name="current_session" required>
                                        <option value="">Choose...</option>
                                        @for($y = date('Y', strtotime('-3 years')); $y <= date('Y', strtotime('+1 years')); $y++)
                                            <option {{ ($setting['current_session'] == ($y . '-' . ($y + 1))) ? 'selected' : '' }}>{{ $y . '-' . ($y + 1) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="societe_title" class="col-md-4 col-form-label text-md-right">{{ __('Societe Title') }}</label>
                                <div class="col-md-6">
                                    <input id="societe_title" type="text" class="form-control" name="societe_title" value="{{ $setting['societe_title'] }}" placeholder="Societe Acronym">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $setting['phone'] }}" placeholder="Phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="societe_email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="societe_email" type="email" class="form-control" name="societe_email" value="{{ $setting['societe_email'] }}" placeholder="Societe Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ $setting['address'] }}" required placeholder="Societe Address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('About Societe') }}<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <textarea id="about" class="form-control" name="about" required rows="3">{{ $setting['about'] }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Societe Logo') }}</label>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/imgs/attachments/logo/'.$setting['logo']) }}" class="img-thumbnail" alt="Logo" style="max-width: 100px; max-height: 100px;">
                                    </div>
                                    <input id="logo" type="file" class="form-control-file" name="logo" accept="image/*">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
