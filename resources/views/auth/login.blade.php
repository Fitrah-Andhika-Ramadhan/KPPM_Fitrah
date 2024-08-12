@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 100vh; display: flex; justify-content: center; align-items: center; background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
    <div class="col-md-6">
        <div class="card shadow-lg rounded-lg border-0" style="overflow: hidden;">
            <!-- Background Gradient -->
            <div class="card-header text-center" style="background: linear-gradient(135deg, #6c63ff, #3f3d56); color: white;">
                <h4 style="font-weight: bold; margin: 0;">{{ __('Login') }}</h4>
            </div>

            <div class="card-body p-5" style="position: relative; background: #ffffff; border-top: 5px solid #6c63ff;">
                <div class="wave" style="position: absolute; top: -100px; left: -50px; width: 200px; height: 200px; background: rgba(108, 99, 255, 0.1); border-radius: 50%; transform: rotate(-30deg);"></div>
                <div class="wave" style="position: absolute; bottom: -100px; right: -50px; width: 200px; height: 200px; background: rgba(108, 99, 255, 0.1); border-radius: 50%; transform: rotate(30deg);"></div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="border: 1px solid #6c63ff; border-radius: 25px; padding: 12px 20px; transition: border-color 0.3s ease;">
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border: 1px solid #6c63ff; border-radius: 25px; padding: 12px 20px; transition: border-color 0.3s ease;">
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="margin-right: 10px;">
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary w-100" style="border-radius: 25px; padding: 12px 0; font-size: 16px; font-weight: bold; background: #6c63ff; border: none; transition: background-color 0.3s ease, transform 0.3s ease;">
                            {{ __('Login') }}
                        </button>
                        <div class="text-center mt-4">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #6c63ff; text-decoration: underline;">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
