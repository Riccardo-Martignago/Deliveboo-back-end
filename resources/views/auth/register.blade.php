@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold">{{ __('Register on Deliverboo!') }}</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ( $errors->all() as  $error)
                                <li>
                                    {{ $error }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="card-body">
                    <form id="registerForm" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-3 col-form-label fw-bold">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control  border border-dark @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <div id="nameError" class="text-danger"></div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-3 col-form-label fw-bold">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control  border border-dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div id="emailError" class="text-danger"></div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-3 col-form-label fw-bold">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control  border border-dark @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div id="passwordError" class="text-danger"></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-3 col-form-label fw-bold">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control  border border-dark" name="password_confirmation" required autocomplete="new-password">
                                <div id="confirmPasswordError" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="piva" class="col-md-3 col-form-label fw-bold">{{ __('VAT') }}</label>

                            <div class="col-md-6">
                                <input id="piva" type="number" class="form-control" min="0" name="piva" required autocomplete="piva" value="{{ old('piva') }}">
                                <div id="pivaError" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo" class="col-md-3 col-form-label fw-bold">{{ __('Photo') }}</label>

                            <div class="col-md-8">
                                <input id="photo" type="file" accept="image/*" class="form-control  border border-dark" name="photo" value="{{ old('photo') }}" required autocomplete="photo" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adress" class="col-md-3 col-form-label fw-bold">{{ __('Address') }}</label>

                            <div class="col-md-8">
                                <input id="adress" type="text" class="form-control  border border-dark" name="adress" value="{{ old('adress') }}" required autocomplete="adress" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3 d-flex">
                            <label for="typology" class="form-check-label w-25 fw-bold">
                                Typologies
                            </label>
                            <div required class="d-flex wrap justify-content-start flex-wrap w-75">
                                @foreach($typologies as $typology)
                                    <div class="form-check col-2 me-3">
                                        <input
                                            class="form-check-input border border-dark"
                                            type="checkbox"
                                            name="typology_id[]"
                                            value="{{ $typology->id }}"
                                            id="typology_{{ $typology->id }}"
                                            @if(in_array($typology->id, old('typology_id', []))) checked @endif>
                                        <label class="form-check-label " for="typology_{{ $typology->id }}">
                                            {{ $typology->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-0 w-100 justify-content-end">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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

@section('scripts')
<script>
document.getElementById('name').addEventListener('input', validateName);
document.getElementById('email').addEventListener('input', validateEmail);
document.getElementById('password').addEventListener('input', validatePassword);
document.getElementById('password-confirm').addEventListener('input', validateConfirmPassword);
document.getElementById('piva').addEventListener('input', validatePiva);

function validateName() {
    const name = document.getElementById('name').value;
    const nameError = document.getElementById('nameError');
    const regex = /^[a-zA-Z\s]+$/;
    if (!regex.test(name)) {
        nameError.textContent = 'Name must not contain numbers or special characters.';
    } else {
        nameError.textContent = '';
    }
}

function validateEmail() {
    const email = document.getElementById('email').value;
    const emailError = document.getElementById('emailError');
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(email)) {
        emailError.textContent = 'Please enter a valid email address.';
    } else {
        emailError.textContent = '';
    }
}

function validatePassword() {
    const password = document.getElementById('password').value;
    const passwordError = document.getElementById('passwordError');
    if (password.length < 8) {
        passwordError.textContent = 'Password must be at least 8 characters long.';
    } else {
        passwordError.textContent = '';
    }
    validateConfirmPassword();
}

function validateConfirmPassword() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password-confirm').value;
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    if (password !== confirmPassword) {
        confirmPasswordError.textContent = "Passwords don't match.";
    } else {
        confirmPasswordError.textContent = '';
    }
}

function validatePiva() {
    const piva = document.getElementById('piva').value;
    const pivaError = document.getElementById('pivaError');
    const regex = /^\d+$/;
    if (piva.length !== 11 && !regex.test(piva) || isNaN(piva)) {
        pivaError.textContent = 'VAT number must contain exactly 11 numbers.';
    } else {
        pivaError.textContent = '';
    }
}

document.getElementById('registerForm').addEventListener('submit', function(event) {
    validateName();
    validateEmail();
    validatePassword();
    validateConfirmPassword();
    validatePiva();

    const nameError = document.getElementById('nameError').textContent;
    const emailError = document.getElementById('emailError').textContent;
    const passwordError = document.getElementById('passwordError').textContent;
    const confirmPasswordError = document.getElementById('confirmPasswordError').textContent;
    const pivaError = document.getElementById('pivaError').textContent;

    if (nameError || emailError || passwordError || confirmPasswordError || pivaError) {
        event.preventDefault();
    }
});
</script>
@endsection
