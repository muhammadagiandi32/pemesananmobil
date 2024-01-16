@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Register") }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label
                                for="name"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Name") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autocomplete="name"
                                    autofocus
                                />

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label
                                for="email"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Email Address") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                />

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="address"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Address") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="address"
                                    type="text"
                                    class="form-control @error('address') is-invalid @enderror"
                                    name="address"
                                    value="{{ old('address') }}"
                                    required
                                    autocomplete="address"
                                    autofocus
                                />

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="nohp"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("No.Tlp") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="nohp"
                                    type="text"
                                    class="form-control @error('nohp') is-invalid @enderror"
                                    name="nohp"
                                    value="{{ old('nohp') }}"
                                    required
                                    autocomplete="nohp"
                                    autofocus
                                />

                                @error('nohp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="nosim"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("No.SIM") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="nosim"
                                    type="text"
                                    class="form-control @error('nosim') is-invalid @enderror"
                                    name="nosim"
                                    value="{{ old('nosim') }}"
                                    required
                                    autocomplete="nosim"
                                    autofocus
                                />

                                @error('nosim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="password"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Password") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                />

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="password-confirm"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Confirm Password") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                />
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __("Register") }}
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
