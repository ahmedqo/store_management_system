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

<body class="flex flex-col flex-wrap lg:flex-row bg-gray-100">
    <section id="overlay"
        class="bg-x-prime bg-opacity-80 backdrop-blur-lg fixed inset-0 z-[100] flex items-center justify-center">
        <img title="logo-image" alt="logo-image" src="{{ asset('img/logo-black.png') }}?v={{ env('APP_VERSION') }}"
            class="block w-32 animate-bounce duration-150" />
    </section>
    <header class="w-full bg-transparent fixed top-0 left-0 right-0 z-[1] lg:z-[50]">
        <nav class="w-full flex items-center gap-2 container mx-auto p-4">
            <div class="w-max flex items-center gap-1 ms-auto">
                <div class="w-max relative">
                    <button x-toggle targets="#languages" properties="opacity-0, pointer-events-none, -translate-y-full"
                        class="p-2 w-[42px] aspect-square flex items-center justify-center rounded-x-core text-x-black outline-none hover:bg-x-black-blur focus-within:bg-x-black-blur hover:text-x-white focus-within:text-x-white">
                        <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M610-196 568.513-90.019Q566-78 555.452-71q-10.548 7-23.606 7Q510-64 499.5-80.963 489-97.927 497-118.094L654.571-537.15Q658-549 668-556.5q10-7.5 22-7.5h31.552q11.821 0 21.672 7T758-538l164 419q6 20.462-5.6 37.73Q904.799-64 884.273-64q-14.692 0-26.733-7.76t-15.536-22.576L808.585-196H610Zm22-72h148l-73.054-202H705l-73 202ZM355.135-397l-179.34 178.842Q162.86-206 146.206-206.5q-16.654-.5-27.93-11Q107-229 108-246.689q1-17.69 11.654-28.321L303-458q-39.6-45.818-70.8-92.409Q201-597 179-646h90q16 34 38.329 64.567 22.328 30.566 48.274 63.433Q403-567 434.628-619.861 466.256-672.721 489-730H63.857q-17.753 0-29.305-12.289Q23-754.579 23-771.982q0-17.404 12.35-29.318 12.35-11.914 29.895-11.914h248.731v-41.893q0-17.529 11.748-29.211Q337.471-896 355.098-896t29.637 11.682q12.011 11.682 12.011 29.211v41.893h249.548q17.685 0 29.696 11.768Q688-789.679 688-771.895q0 17.509-12.282 29.702Q663.436-730 645.759-730h-74.975Q548-656 510-587.5T416-457l102 103-29.389 83.933L355.135-397Z" />
                        </svg>
                    </button>
                    <ul id="languages"
                        class="w-max shadow-x-core flex flex-col bg-x-white rounded-x-core overflow-hidden absolute right-0 rtl:left-0 rtl:right-auto top-full mt-2 transition-all duration-150 z-20 opacity-0 pointer-events-none -translate-y-full origin-top-right rtl:origin-top-left">
                        <li class="w-full">
                            <a href="{{ route('actions.language.index', 'en') }}"
                                class="w-full flex gap-2 items-center p-2 py-1 outline-none text-x-black hover:bg-x-shade hover:bg-opacity-20 focus-within:bg-x-shade focus-within:bg-opacity-20 {{ Core::lang('en') ? '!bg-x-shade !bg-opacity-40 hover:!bg-opacity-20 focus-within:!bg-opacity-20' : '' }}">
                                <img src="{{ asset('lang/en.png') }}?v={{ env('APP_VERSION') }}" alt="en flag"
                                    class="block w-5 pointer-events-none" />
                                <span class="text-sm font-medium">English</span>
                            </a>
                        </li>
                        <li class="w-full">
                            <a href="{{ route('actions.language.index', 'fr') }}"
                                class="w-full flex gap-2 items-center p-2 py-1 outline-none text-x-black hover:bg-x-shade hover:bg-opacity-20 focus-within:bg-x-shade focus-within:bg-opacity-20 {{ Core::lang('fr') ? '!bg-x-shade !bg-opacity-40 hover:!bg-opacity-20 focus-within:!bg-opacity-20' : '' }}">
                                <img src="{{ asset('lang/fr.png') }}?v={{ env('APP_VERSION') }}" alt="fr flag"
                                    class="block w-5 pointer-events-none" />
                                <span class="text-sm font-medium">Francais</span>
                            </a>
                        </li>
                        <li class="w-full">
                            <a href="{{ route('actions.language.index', 'it') }}"
                                class="w-full flex gap-2 items-center p-2 py-1 outline-none text-x-black hover:bg-x-shade hover:bg-opacity-20 focus-within:bg-x-shade focus-within:bg-opacity-20 {{ Core::lang('it') ? '!bg-x-shade !bg-opacity-40 hover:!bg-opacity-20 focus-within:!bg-opacity-20' : '' }}">
                                <img src="{{ asset('lang/it.png') }}?v={{ env('APP_VERSION') }}" alt="en flag"
                                    class="block w-5 pointer-events-none" />
                                <span class="text-sm font-medium">Italiano</span>
                            </a>
                        </li>
                        <li class="w-full">
                            <a href="{{ route('actions.language.index', 'ar') }}"
                                class="w-full flex gap-2 items-center p-2 py-1 outline-none text-x-black hover:bg-x-shade hover:bg-opacity-20 focus-within:bg-x-shade focus-within:bg-opacity-20 {{ Core::lang('ar') ? '!bg-x-shade !bg-opacity-40 hover:!bg-opacity-20 focus-within:!bg-opacity-20' : '' }}">
                                <img src="{{ asset('lang/ar.png') }}?v={{ env('APP_VERSION') }}" alt="ar flag"
                                    class="block w-5 pointer-events-none" />
                                <span class="text-sm font-medium">العربية</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="w-full min-h-[100vh] flex items-center justify-center">
        <section class="container mx-auto lg:w-[500px]">
            <div class="p-4 flex flex-col gap-4">
                <a href="/" class="w-max mx-auto block">
                    <img title="logo-image" alt="logo-image"
                        src="{{ asset('img/logo-black.png') }}?v={{ env('APP_VERSION') }}" class="block w-32" />
                </a>
                <div class="bg-x-white p-4 rounded-x-core shadow-xl">
                    @yield('content')
                </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('js/x.elements.js') }}?v={{ env('APP_VERSION') }}"></script>
    <script src="{{ asset('js/index.js') }}?v={{ env('APP_VERSION') }}"></script>
    @if (Session::has('message'))
        <script>
            const data = {!! json_encode(Session::all()) !!};
            x.Toaster(data.message, data.type);
        </script>
    @endif
    <script>
        x.Password().Toggle();
        x.Toggle.disable({
            xs: [{
                selector: "#languages",
                class: "opacity-0",
            }]
        });
        window.addEventListener("DOMContentLoaded", () => {
            document.querySelector("#overlay").remove();
            document.body.classList.remove("!overflow-hidden", "!h-screen");
        });
    </script>
    @yield('scripts')
</body>

</html>
