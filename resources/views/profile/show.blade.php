<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Profile</title>
    <link rel="shortcut icon" href="{{ asset('/') }}assets/img/icon.png" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/themify-icons.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/flaticon.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/shortcodes.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/main.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/megamenu.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        nav.main-menu ul.menu li ul.mega-submenu li a {
            padding: 10px 15px;
        }

        .wrap-form label {
            margin-left: 15px;
        }

        .highlight-greeting {
            background-color: #3C9E7D;
            color: #ffffff;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .logged-in-message {
            font-size: 14px;
            color: #333333;
            margin-top: 5px;
        }

        .mega-menu-link {
            color: black;
        }

        .sticky-header {
            position: fixed;
            font-weight: bold;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .url_shortener-link {
            color: black;
            transition: color 0.3s;
        }

        .url_shortener-link:hover {
            color: green;
        }
    </style>
</head>

<body>
    <div class="page">
        <header id="masthead" class="header ttm-header-style-01">
            <div id="site-header-menu" class="site-header-menu ttm-bgcolor-white">
                <div class="site-header-menu-inner ttm-stickable-header" style="color: black">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="site-navigation d-flex flex-row">
                                    <div class="site-branding mr-auto">
                                        <a class="home-link" href="{{ route('url_shortener') }}" title="URL Shortener" rel="home">
                                            <img id="logo-img" style="width: 80px; height: auto;" class="img-center" src="{{ asset('/') }}assets/img/icon.png" alt="logo-img">
                                        </a>
                                    </div>
                                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                        <span class="menubar-box">
                                            <span class="menubar-inner"></span>
                                        </span>
                                    </div>
                                    <nav class="main-menu menu-mobile ml-auto" id="menu">
                                        <ul class="menu">
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-link" style="color: white;">
                                                    <span class="highlight-greeting">Hi, {{ Auth::user()->first_name }}!</span>
                                                </a>
                                                <ul class="mega-submenu">
                                                    <li class="mega-menu-item">
                                                        @php
                                                        if (auth()->user()->hasRole('superadmin')) {
                                                        $user_role = 'Superadmin';
                                                        } else if (auth()->user()->hasRole('admin')) {
                                                        $user_role = 'User';
                                                        } else if (auth()->user()->hasRole('user')) {
                                                        $user_role = 'Guest User';
                                                        }
                                                        @endphp
                                                        <p class="logged-in-message text-center">You are logged in as {{ $user_role }}.</p>
                                                        <a href="{{ route('profile.show') }}">Profile</a>

                                                        <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out
                                                            <i class="fa fa-sign-out"></i>
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="ttm-page-title-row">
            <div class="ttm-page-title-row-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="page-title-heading">
                                <h2 class="title" style="color: white;">Profile</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-app-layout>
            <div class="container-fluid">
                <div class="row col-md-10">
                    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
                        <x-section-border />
                        @endif
                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>
                        <x-section-border />
                        @endif
                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>
                        <x-section-border />
                        @endif
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.logout-other-browser-sessions-form')
                        </div>
                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <x-section-border />
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-app-layout>
        <footer class="footer widget-footer clearfix text-center">
            <div class="bottom-footer-text">
                <div class="container">
                    <div class="row copyright">
                        <div class="col-sm-12">
                            <span>Copyright © 2024. URL Shortener by <a href="https://github.com/tausif1337">Tausif</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
    <script src="{{ asset('/') }}assets/js/jquery.min.js"></script>
    <script src="{{ asset('/') }}assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}assets/js/tether.min.js"></script>
    <script src="{{ asset('/') }}assets/js/jquery.easing.js"></script>
    <script src="{{ asset('/') }}assets/js/jquery-waypoints.js"></script>
    <script src="{{ asset('/') }}assets/js/jquery-validate.js"></script>
    <script src="{{ asset('/') }}assets/js/jquery.prettyPhoto.js"></script>
    <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
    <script src="{{ asset('/') }}assets/js/numinate.min.js"></script>
    <script src="{{ asset('/') }}assets/js/imagesloaded.min.js"></script>
    <script src="{{ asset('/') }}assets/js/jquery-isotope.js"></script>
    <script src="{{ asset('/') }}assets/js/moment.min.js"></script>
    <script src="{{ asset('/') }}assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('/') }}assets/js/main.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var header = document.getElementById("site-header-menu");
            var sticky = header.offsetTop;

            function handleScroll() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky-header");
                } else {
                    header.classList.remove("sticky-header");
                }
            }
            window.onscroll = function() {
                handleScroll();
            };
        });
    </script>
</body>

</html>