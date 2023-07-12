<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.5, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    @if (env('APP_ENV') == 'local')
        @vite(['resources/css/app.css'])
    @else
        @php
            $json = File::get(base_path('public/build/manifest.json'));
            $manifest = json_decode($json, true);
            $js = $manifest['resources/js/app.js']['file'];
            $css = $manifest['resources/css/app.css']['file'];
        @endphp
        <link rel="stylesheet" href="{{ asset('/build') . '/' . $css }}" />
    @endif
    @livewireStyles
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">
    <!-- HTML Meta Tags -->
    {{-- <title>
        @if ($page->origin_title == 'Main')
            {{ $page->seo_title ?: env('APP_NAME', '') }}
        @else
            {{ $page->title ?: __('frontend.' . $page->origin_title) . ' - ' . ($page->seo_title ?: env('APP_NAME', '')) }}
        @endif
    </title>
    <meta name="description" content="{{ $page->seo_description ?? null }}">
    <meta name="keywords" content="{{ $page->seo_keywords ?? null }}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ env('APP_URL', '') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page->seo_title ?: env('APP_NAME', '') }}">
    <meta property="og:description" content="{{ $page->seo_description ?? null }}">
    <meta property="og:image" content="{{ $og->getFile() ?? null }}">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ str_replace('https://', '', env('APP_URL', '')) }}">
    <meta property="twitter:url" content="{{ env('APP_URL', '') }}">
    <meta name="twitter:title" content="{{ $page->seo_title ?: env('APP_NAME', '') }}">
    <meta name="twitter:description" content="{{ $page->seo_description ?? null }}">
    <meta name="twitter:image" content="{{ $og->getFile() ?? null }}">
    <!-- MS Meta Tags -->
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff"> --}}
</head>

<body>
    {{-- @livewire('front.includes.header.header', ['active_page' => $page]) --}}

    @yield('content')

    {{-- @livewire('front.includes.footer.footer', ['active_page' => $page]) --}}

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    @if (env('APP_ENV') == 'local')
        @vite(['resources/js/app.js'])
    @else
        <script src="{{ asset('/build') . '/' . $js }}"></script>
    @endif
    {{-- <script>
        var onloadCallback = function() {
            var sitekey = '{{ env('GOOGLE_RECAPTCHA_KEY') }}'
            $('.g-recaptcha').html('');
            $('.g-recaptcha').each(function(i, captcha) {
                try {
                    if (i == 0) {
                        grecaptcha.render(captcha, {
                            'sitekey': sitekey,
                            'callback': captchaCallback
                        });
                    }
                } catch (error) {
                    grecaptcha.render(captcha, {
                        'sitekey': sitekey,
                        'callback': popupCallback
                    });

                }
                if (i == 1) {
                    grecaptcha.render(captcha, {
                        'sitekey': sitekey,
                        'callback': popupCallback
                    });
                }
            });
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl={{ app()->getLocale() }}"
        async defer></script> --}}
    @livewireScripts
</body>

</html>
