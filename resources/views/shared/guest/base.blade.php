<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Core::lang('ar') ? 'rtl' : 'ltr' }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}?v={{ env('APP_VERSION') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ env('APP_VERSION') }}" />
    <title>@yield('title')</title>
</head>

<body class="bg-x-light !overflow-hidden !h-screen">
    <section id="overlay"
        class="bg-x-prime bg-opacity-80 backdrop-blur-lg fixed inset-0 z-[100] flex items-center justify-center">
        <img title="logo-image" alt="logo-image" src="{{ asset('img/logo.svg') }}?v={{ env('APP_VERSION') }}"
            class="block w-32 animate-bounce duration-150" />
    </section>
    <header>
        @include('shared.guest.nav')
        @yield('header')
    </header>
    <main class="w-full container mx-auto {{ request()->routeIs('views.guest.home') ? '' : 'my-10' }}">
        @yield('content')
    </main>
    @include('shared.guest.footer')
    <script src="{{ asset('js/x.elements.js') }}?v={{ env('APP_VERSION') }}"></script>
    <script src="{{ asset('js/index.js') }}?v={{ env('APP_VERSION') }}"></script>
    @if (Session::has('message'))
        <script>
            const data = {!! json_encode(Session::all()) !!};
            x.Toaster(data.message, data.type);
            if (data.clean) {
                localStorage.removeItem("{{ env('APP_CART') }}");
            }
        </script>
    @endif
    <script>
        x.Toggle();
        x.Toggle.disable({
            xs: [{
                selector: "#languages",
                class: "opacity-0",
            }, {
                selector: "#navigation",
                class: "-translate-x-full",
            }, {
                selector: "#search",
                class: "-translate-y-full",
            }, ],
            lg: [{
                selector: "#navigation",
                class: "0000",
            }, ]
        });
        localStorage.{{ env('APP_CART') }} || localStorage.setItem("{{ env('APP_CART') }}", "[]");
        window.addEventListener("DOMContentLoaded", () => {
            document.querySelector("#overlay").remove();
            document.body.classList.remove("!overflow-hidden", "!h-screen");
        });
        const nav = document.querySelector("#navigation");
        const ser = document.querySelector("#search");
        nav.addEventListener("click", (e) => {
            if (e.target === nav && !nav.classList.contains("opacity-0")) {
                nav.classList.add("opacity-0");
                nav.classList.add("-translate-x-full");
                nav.classList.add("pointer-events-none");
                nav.classList.add("rtl:translate-x-full");
            }
        });
        nav.children[0].addEventListener("click", (e) => {
            e.stopPropagation();
        });

        ser.addEventListener("click", (e) => {
            if (e.target === ser && !ser.classList.contains("opacity-0")) {
                ser.classList.add("opacity-0");
                ser.classList.add("-translate-y-full");
                ser.classList.add("pointer-events-none");
            }
        });
        ser.children[0].addEventListener("click", (e) => {
            e.stopPropagation();
        });
    </script>
    @yield('scripts')
</body>

</html>
