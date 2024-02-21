<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Login</title>
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
</style>

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                               

                                <x-validation-errors class="mb-4" />


                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')"
                                                 required autofocus autocomplete="username" />
                                        <x-label for="email" class="form-label" value="{{ __('Email') }}" />
                                    </div>

                                    <div class="mb-4">
                                        <div class="form-outline" style="display: flex; align-items: center;">
                                            <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password"
                                                     required autocomplete="current-password" />
                                            <x-label for="password" class="form-label" value="{{ __('Password') }}" />
                                            <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                        </div>
                                    </div>

                                    <div class="block mt-4">
                                        <label for="remember_me" class="flex items-center">
                                            <x-checkbox id="remember_me" name="remember" />
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>

                                    <div class="text-center flex pt-1 mb-5 mt-3 pb-1 rounded-pill">

                                        @if (Route::has('password.request'))
                                            <a class="text-muted text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif

                                        <x-button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 mt-3 rounded-pill">
                                            {{ __('Log in') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h1 class="mb-4">New Here?</h1>
                                <p class="small mb-0"></p>
                                <h3 style="color: #ffffff;">Sign up to gain access to URL Shortner</h3>
                                <a href="{{ route('register') }}">
                                    <button type="submit" class="btn btn-success rounded-pill mt-2">Register</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MDB -->
<script type="text/javascript" src="{{ asset('/') }}assets/js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>
