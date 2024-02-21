<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Register</title>
    <!-- MDB icon -->
    <!-- <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" /> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"/>
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"/>
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap-login-form.min.css"/>
</head>

<body>

<style>
    .gradient-custom-2 {

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to bottom, #3c9e7d, #146c7c);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
    .custom-label::after {
        content: " *";
        color: red;
    }
</style>

<section class="gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                               
                                <x-validation-errors class="mb-4" />

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-outline mb-2">
                                        <x-input id="first_name" class="block mt-1 w-full form-control" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                                        <x-label for="first_name" class="form-label custom-label" value="{{ __('First Name') }}" />
                                    </div>

                                    <div class="form-outline mb-2">
                                        <x-input id="last_name" class="block mt-1 w-full form-control" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                                        <x-label for="last_name" class="form-label custom-label" value="{{ __('Last Name') }}" />
                                    </div>

                                    <div class="form-outline mb-2">
                                        <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                        <x-label for="email" class="form-label custom-label" value="{{ __('Email') }}" />
                                    </div>

                                    <div class="form-outline mb-2">
                                        <div class="form-outline" style="display: flex; align-items: center;">
                                            <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                                            <x-label for="password" class="form-label custom-label" value="{{ __('Password') }}" />
                                            <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-2">
                                        <div class="form-outline" style="display: flex; align-items: center;">
                                            <x-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                            <x-label for="password_confirmation" class="form-label custom-label" value="{{ __('Confirm Password') }}" />
                                            <i class="far fa-eye" id="togglePasswordConfirmation" style="margin-left: -30px; cursor: pointer;"></i>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-2">
                                        <x-input id="address" class="block mt-1 w-full form-control" type="text" name="address" :value="old('address')" autofocus autocomplete="address" />
                                        <x-label for="address" class="form-label" value="{{ __('Address') }}" />
                                    </div>

                                    <div class="form-outline mb-2">
                                        <x-input type="text" name="phone_no" id="phone_no" class="block mt-1 w-full form-control" />
                                        <x-label for="phone_no" class="form-label" value="{{ __('Phone Number') }}"/>
                                    </div>

{{--                                    <div class="form-outline mb-2">--}}
{{--                                        <x-input id="city" class="block mt-1 w-full form-control" type="text" name="city" :value="old('city')" autofocus autocomplete="city" />--}}
{{--                                        <x-label for="city" class="form-label" value="{{ __('City') }}" />--}}
{{--                                    </div>--}}

{{--                                    <div class="form-outline mb-2">--}}
{{--                                        <select name="country" id="country" class="block mt-1 w-full form-select mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm" aria-label="Default select example">--}}
{{--                                            <option value="" selected>Select Country</option>--}}
{{--                                            <option value="bangladesh">Bangladesh</option>--}}
{{--                                            <option value="usa">United States of America</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

                                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                        <div class="mt-4">
                                            <x-label for="terms">
                                                <div class="flex items-center">
                                                    <x-checkbox name="terms" id="terms" required />

                                                    <div class="ml-2">
                                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                        ]) !!}
                                                    </div>
                                                </div>
                                            </x-label>
                                        </div>
                                    @endif

                                    <div class="text-center pt-1 mb-5 pb-1 rounded-pill">
                                        <a href="">
                                            <x-button class="ml-4 btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 mt-3 rounded-pill">
                                                {{ __('Register') }}
                                            </x-button>
                                        </a>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h1 class="mb-4">Already Registered?</h1>
                                <p class="small mb-0"></p>
                                <h3 style="color: #ffffff;">Press the button below to log in to your account</h3>
                                <a href="{{ route('login') }}">
                                    <button type="submit" class="btn btn-success rounded-pill mt-2" style="color: white;">Log In</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Data Picker Initialization -->
{{--<script>--}}
{{--    $(function () {--}}
{{--        $('#datepicker').datepicker();--}}
{{--    });--}}
{{--</script>--}}

<!-- MDB -->
<script type="text/javascript" src="{{ asset('/') }}assets/js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
<script>
    function togglePasswordVisibility(toggleButton, passwordField) {
        toggleButton.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    }

    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePasswordVisibility(togglePassword, password);

    const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
    const passwordConfirmation = document.querySelector('#password_confirmation');
    togglePasswordVisibility(togglePasswordConfirmation, passwordConfirmation);
</script>

</body>
</html>
