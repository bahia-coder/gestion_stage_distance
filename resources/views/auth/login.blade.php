@extends('layouts.pages')
@section('content')
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                @if($type == 'stagaire')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول متدرب</h3>
                        @elseif($type == 'employe')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول عامل </h3>
                        @elseif($type == 'admin')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول ادمن</h3>
                        @endif
                        @if (\Session::has('message'))
                                <div class="alert alert-danger">
                                 <li>{!! \Session::get('message') !!}</li>
                                </div>
                            @endif
                <form action="{{ route('login') }}" method="POST" >
                        @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input type="email" class="form-control" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>this email doesn't exist</strong>
                                    </span>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="hidden" value="{{$type}}" name="type">
                  </div>

                  <div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
                                            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                            {{ __('Login') }}
                                        </button>
									</div>
								</div>
                                <div class="d-flex align-items-center justify-content-between mb-4">

                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                @endif
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="{{ URL::asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ URL::asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
@endSection
