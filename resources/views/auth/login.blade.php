@extends('layouts.auth')
@section('page_title', 'Login')

@section('content')
    <!-- Page Content -->
    <div class="page-content page-auth">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center row-login">
                    <div class="col-lg-6 text-center">
                        <img src="/images/login-placeholder.png" alt="" class="w-50 mb-4 mb-lg-none" />
                    </div>
                    <div class="col-lg-5">
                        <h2>
                            Belanja kebutuhan utama, <br />
                            menjadi lebih mudah
                        </h2>
                        @if (session()->has('errorMessage'))
                            <div class="alert alert-danger w-75">
                                {{ session()->get('errorMessage') }}
                            </div>
                        @endif
                        <form class="mt-3" method="POST" action="{{ route('authenticate') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control w-75" aria-describedby="emailHelp"
                                    value="{{ old('email') }}" />
                                @error('email')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control w-75" />
                                @error('password')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-block w-75 mt-4">
                                Sign In to My Account
                            </button>
                            <a class="btn btn-signup w-75 mt-2" href="{{ route('register') }}">
                                Sign Up
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
