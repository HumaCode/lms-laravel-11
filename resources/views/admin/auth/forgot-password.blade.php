<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Forgot password </title>
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
</head>

<body class=" d-flex flex-column">
    <script src="{{ asset('/') }}admin/assets/dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('/') }}admin/assets/static/logo.svg" width="110" height="32"
                        alt="Tabler" class="navbar-brand-image">
                </a>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="card card-md" action="{{ route('admin.password.email') }}" method="POST" autocomplete="off"
                novalidate>
                @csrf

                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Forgot password</h2>
                    <p class="text-secondary mb-4">Forgot your password? No problem. Just let us know your email address
                        and we will email you a password reset link that will allow you to choose a new one.</p>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Enter email" value="{{ old('email') }}" autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                <path d="M3 7l9 6l9 -6" />
                            </svg>
                            Send me new password
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center text-secondary mt-3">
                Forget it, <a href="{{ route('admin.login') }}">send me back</a> to the sign in screen.
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('/') }}admin/assets/dist/js/tabler.min.js?1692870487" defer></script>
    <script src="{{ asset('/') }}admin/assets/dist/js/demo.min.js?1692870487" defer></script>
</body>

</html>
