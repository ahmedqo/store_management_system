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

<body class="flex flex-col flex-wrap lg:flex-row bg-white">
    <main class="p-4 w-full container mx-auto">
        <form action="" class="w-full flex flex-col gap-4 lg:flex-row lg:flex-wrap items-start">
            <div class="w-full lg:flex-1 flex flex-col gap-4">
                <div class="w-full flex flex-wrap gap-4 items-center">
                    <button
                        class="-me-2 w-6 h-6 flex items-center justify-center text-red-500 outline-none hover:text-red-300 focus:text-red-300">
                        <svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                        </svg>
                    </button>
                    <div class="h-full w-20 aspect-square bg-blue-500 rounded-md row-span-2">
                    </div>
                    <div class="w-0 flex-1 gap-2 flex flex-col justify-center">
                        <h2 class="text-md font-semibold lg:text-xl text-x-black w-full truncate">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel, natus.
                        </h2>
                        <div class="w-full flex gap-2 items-center">
                            <div class="counter flex flex-wrap w-max gap-1 items-center">
                                <button counter="-"
                                    class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-x-prime text-x-prime text-lg font-black outline-none hover:border-x-acent hover:text-x-acent focus:border-x-acent focus:text-x-acent">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M225-434q-20.75 0-33.375-13.36Q179-460.719 179-479.86q0-20.14 12.625-32.64T225-525h511q19.775 0 32.888 12.675Q782-499.649 782-479.509q0 19.141-13.112 32.325Q755.775-434 736-434H225Z" />
                                    </svg>
                                </button>
                                <input counter="x" type="number" name="qte" value="1"
                                    class="w-20 text-center bg-transparent text-x-black font-black p-1 text-md rounded-md focus-within:outline-x-prime focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                                <button counter="+"
                                    class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-x-prime text-x-prime text-lg font-black outline-none hover:border-x-acent hover:text-x-acent focus:border-x-acent focus:text-x-acent">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-4/12 flex flex-col gap-4 x-paper lg:sticky lg:top-4">
                <input id="first_name" type="text" name="first_name" placeholder="{{ __('First Name') }}"
                    value="{{ old('first_name') }}"
                    class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                <input id="first_name" type="text" name="first_name" placeholder="{{ __('First Name') }}"
                    value="{{ old('first_name') }}"
                    class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                <input id="first_name" type="text" name="first_name" placeholder="{{ __('First Name') }}"
                    value="{{ old('first_name') }}"
                    class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                <input id="first_name" type="text" name="first_name" placeholder="{{ __('First Name') }}"
                    value="{{ old('first_name') }}"
                    class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
            </div>
        </form>
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
        x.Uploader();
        Counter(".counter");
    </script>
    @yield('scripts')
</body>

</html>
