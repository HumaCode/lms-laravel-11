<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin Login Page</title>
    <!-- CSS files -->
    <link href="{{ asset('/') }}admin/assets/dist/css/tabler.min.css?1692870487" rel="stylesheet" />
    <link href="{{ asset('/') }}admin/assets/dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
    <link href="{{ asset('/') }}admin/assets/dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
    <link href="{{ asset('/') }}admin/assets/dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
    <link href="{{ asset('/') }}admin/assets/dist/css/demo.min.css?1692870487" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    @vite(['resources/js/admin/login.js'])
</head>

<body class=" d-flex flex-column bg-white">
    <script src="{{ asset('/') }}admin/assets/dist/js/demo-theme.min.js?1692870487"></script>
    <div class="row g-0 flex-fill">
        <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-lg-5">
                <div class="text-center mb-4">
                    <a href="{{ route('admin.login') }}" class="navbar-brand navbar-brand-autodark"><img
                            src="{{ asset('/') }}admin/assets/static/logo.svg" height="36" alt=""></a>
                </div>
                <h2 class="h3 text-center mb-3">
                    Login to your account
                </h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form action="{{ route('admin.login.store') }}" method="POST" autocomplete="off" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="form-control" placeholder="Email Address" required autofocus autocomplete="off">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-2">

                        @if (Route::has('password.request'))
                            <label class="form-label">
                                Password
                                <span class="form-label-description">
                                    <a href="{{ route('admin.password.request') }}">I forgot password</a>
                                </span>
                            </label>
                        @endif

                        <div class="input-group input-group-flat">
                            <input type="password" id="password"name="password" class="form-control password"
                                placeholder="Your password" autocomplete="current-password" required>
                            <span class="input-group-text toggle-password">
                                <a href="javascript:;" class="link-secondary" title="Show password"
                                    data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path
                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mb-2">
                        <label for="remember_me" class="form-check">
                            <input type="checkbox" id="remember_me" name="remember" class="form-check-input" />
                            <span class="form-check-label">Remember me on this device</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>
                </form>
                {{-- <div class="text-center text-secondary mt-3">
                    Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
                </div> --}}
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Photo -->
            <div class="bg-cover h-100 min-vh-100"
                style="background-image: url({{ asset('/') }}admin/assets/static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg)">
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('/') }}admin/assets/dist/js/tabler.min.js?1692870487" defer></script>
    <script src="{{ asset('/') }}admin/assets/dist/js/demo.min.js?1692870487" defer></script>
</body>

</html>
