<nav class="w-full relative z-[2]">
    <div id="search"
        class="-translate-y-full opacity-0 pointer-events-none fixed inset-0 bg-x-black-blur backdrop-blur-sm transition-all duration-150 p-4 z-[2] flex">
        <form id="form" action="{{ route('views.guest.products') }}"
            class="w-full lg:w-2/5 lg:mx-auto my-auto bg-x-white p-4 lg:p-6 rounded-x-core flex flex-col gap-4 lg:gap-6"
            method="GET">
            <h3 class="text-xl lg:text-2xl font-x-core text-x-black">
                {{ __('Explore our vast selection of products and Find what you\'re looking for!') }}
            </h3>
            <div
                class="w-full relative text-x-shade bg-x-light focus-within:text-x-prime border border-x-shade rounded-md">
                <input type="search" name="search" placeholder="{{ __('Search') }}"
                    value="{{ request()->search ?? '' }}"
                    class="w-full bg-transparent text-x-black focus-within:outline-x-prime p-2 ps-8 text-base rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                <svg class="block w-5 h-5 pointer-events-none absolute top-1/2 -translate-y-1/2 left-2 rtl:left-auto rtl:right-2"
                    fill="currentcolor" viewBox="0 -960 960 960">
                    <path
                        d="M373.438-315q-115.311 0-193.875-78.703Q101-472.406 101-585.203T179.703-776.5q78.703-78.5 191.5-78.5T562.5-776.356Q641-697.712 641-584.85q0 45.85-13 83.35-13 37.5-38 71.5l237 235q13 13.556 13 33.256 0 19.7-13 33.244-14.333 13.5-33.244 13.5-18.912 0-32.756-14L526.472-364Q496-341.077 457.541-328.038 419.082-315 373.438-315Zm-1.997-91q75.985 0 127.272-51.542Q550-509.083 550-584.588q0-75.505-51.346-127.459Q447.309-764 371.529-764q-76.612 0-128.071 51.953Q192-660.093 192-584.588t51.311 127.046Q294.623-406 371.441-406Z" />
                </svg>
            </div>
        </form>
    </div>
    <div class="container p-4 mx-auto flex flex-col gap-4">
        <ul class="w-full flex gap-4 items-center">
            <li class="flex-[1]">
                <button x-toggle targets="#search" properties="opacity-0, pointer-events-none, -translate-y-full"
                    class="p-2 w-[42px] aspect-square hidden lg:flex items-center justify-center rounded-md text-x-black hover:bg-x-shade hover:bg-opacity-20 focus-within:bg-x-shade focus-within:bg-opacity-20 outline-none">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M373.438-315q-115.311 0-193.875-78.703Q101-472.406 101-585.203T179.703-776.5q78.703-78.5 191.5-78.5T562.5-776.356Q641-697.712 641-584.85q0 45.85-13 83.35-13 37.5-38 71.5l237 235q13 13.556 13 33.256 0 19.7-13 33.244-14.333 13.5-33.244 13.5-18.912 0-32.756-14L526.472-364Q496-341.077 457.541-328.038 419.082-315 373.438-315Zm-1.997-91q75.985 0 127.272-51.542Q550-509.083 550-584.588q0-75.505-51.346-127.459Q447.309-764 371.529-764q-76.612 0-128.071 51.953Q192-660.093 192-584.588t51.311 127.046Q294.623-406 371.441-406Z" />
                    </svg>
                </button>
                <button x-toggle targets="#navigation"
                    properties="opacity-0, pointer-events-none, -translate-x-full, rtl:translate-x-full"
                    class="lg:hidden p-2 w-[42px] aspect-square flex items-center justify-center rounded-md text-x-black hover:bg-x-shade hover:bg-opacity-20 focus-within:bg-x-shade focus-within:bg-opacity-20 rtl:rotate-180 outline-none">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M129-215q-20.75 0-33.375-12.675Q83-240.351 83-261.175 83-280 95.625-293T129-306h458q19.75 0 32.375 13.175 12.625 13.176 12.625 32Q632-240 619.375-227.5 606.75-215 587-215H129Zm0-221q-20.75 0-33.375-13.175Q83-462.351 83-482.175 83-502 95.625-514.5 108.25-527 129-527h339q18.75 0 31.875 12.675Q513-501.649 513-481.825 513-462 499.875-449 486.75-436 468-436H129Zm0-218q-20.75 0-33.375-13.175Q83-680.351 83-700.175 83-720 95.625-733 108.25-746 129-746h458q19.75 0 32.375 13.175 12.625 13.176 12.625 33Q632-680 619.375-667 606.75-654 587-654H129Zm605 173 114 113q13 14 12.5 33T847-304q-15 14-33.5 14T782-304L637-450q-14-13-14-31t14-32l145-146q13-13 31.5-13t33.5 13q13 14 12.5 33T847-594L734-481Z" />
                    </svg>
                </button>
            </li>
            <li class="flex-[1] flex">
                <a href="{{ route('views.guest.home') }}" class="w-max mx-auto">
                    <img alt="logo-image" src="{{ asset('img/logo.svg') }}?v={{ env('APP_VERSION') }}"
                        class="block w-20" />
                </a>
            </li>
            <li class="sm:relative flex-[1] flex gap-1 justify-end">
                <div class="sm:relative">
                    <button x-toggle targets="#languages" properties="opacity-0, pointer-events-none, -translate-y-full"
                        class="p-2 w-[42px] aspect-square flex items-center justify-center rounded-md text-x-black hover:bg-x-shade hover:bg-opacity-20 focus-within:bg-x-shade focus-within:bg-opacity-20 outline-none">
                        <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M610-196 568.513-90.019Q566-78 555.452-71q-10.548 7-23.606 7Q510-64 499.5-80.963 489-97.927 497-118.094L654.571-537.15Q658-549 668-556.5q10-7.5 22-7.5h31.552q11.821 0 21.672 7T758-538l164 419q6 20.462-5.6 37.73Q904.799-64 884.273-64q-14.692 0-26.733-7.76t-15.536-22.576L808.585-196H610Zm22-72h148l-73.054-202H705l-73 202ZM355.135-397l-179.34 178.842Q162.86-206 146.206-206.5q-16.654-.5-27.93-11Q107-229 108-246.689q1-17.69 11.654-28.321L303-458q-39.6-45.818-70.8-92.409Q201-597 179-646h90q16 34 38.329 64.567 22.328 30.566 48.274 63.433Q403-567 434.628-619.861 466.256-672.721 489-730H63.857q-17.753 0-29.305-12.289Q23-754.579 23-771.982q0-17.404 12.35-29.318 12.35-11.914 29.895-11.914h248.731v-41.893q0-17.529 11.748-29.211Q337.471-896 355.098-896t29.637 11.682q12.011 11.682 12.011 29.211v41.893h249.548q17.685 0 29.696 11.768Q688-789.679 688-771.895q0 17.509-12.282 29.702Q663.436-730 645.759-730h-74.975Q548-656 510-587.5T416-457l102 103-29.389 83.933L355.135-397Z" />
                        </svg>
                    </button>
                    <ul id="languages"
                        class="flex -mt-3 sm:mt-px lg:mt-0 w-full sm:w-max z-[2] absolute left-0 right-0
                        sm:left-auto sm:right-0 rtl:sm:right-auto rtl:sm:left-0 top-full flex-col bg-x-white pointer-events-none -translate-y-full opacity-0 transition-all duration-150 rounded-x-core shadow-x-drop overflow-hidden">
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
                <button x-toggle targets="#search" properties="opacity-0, pointer-events-none, -translate-y-full"
                    class="p-2 w-[42px] aspect-square flex lg:hidden items-center justify-center rounded-md text-x-black hover:bg-x-shade hover:bg-opacity-20 focus-within:bg-x-shade focus-within:bg-opacity-20 outline-none">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M373.438-315q-115.311 0-193.875-78.703Q101-472.406 101-585.203T179.703-776.5q78.703-78.5 191.5-78.5T562.5-776.356Q641-697.712 641-584.85q0 45.85-13 83.35-13 37.5-38 71.5l237 235q13 13.556 13 33.256 0 19.7-13 33.244-14.333 13.5-33.244 13.5-18.912 0-32.756-14L526.472-364Q496-341.077 457.541-328.038 419.082-315 373.438-315Zm-1.997-91q75.985 0 127.272-51.542Q550-509.083 550-584.588q0-75.505-51.346-127.459Q447.309-764 371.529-764q-76.612 0-128.071 51.953Q192-660.093 192-584.588t51.311 127.046Q294.623-406 371.441-406Z" />
                    </svg>
                </button>
            </li>
        </ul>
        <div id="navigation"
            class="-translate-x-full rtl:translate-x-full opacity-0 pointer-events-none lg:translate-x-0 rtl:lg:translate-x-0 lg:opacity-100 z-[2] lg:z-[0] lg:pointer-events-auto fixed inset-0 bg-x-black-blur backdrop-blur-sm lg:relative lg:inset-auto lg:backdrop-blur-none lg:bg-transparent lg:w-max lg:mx-auto transition-all duration-150">
            <ul
                class="w-[220px] h-full lg:h-auto lg:w-max min-w-max flex flex-col lg:flex-row gap-2 lg:gap-4 p-4 lg:p-0 items-start lg:items-center bg-x-white lg:bg-transparent">
                <li>
                    <a href="{{ route('views.guest.home') }}"
                        class="uppercase block w-full text-center text-x-black text-base lg:w-max font-x-core hover:text-x-prime focus-within:text-x-prime outline-none">
                        {{ __('Home') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.guest.brands') }}"
                        class="uppercase block w-full text-center text-x-black text-base lg:w-max font-x-core hover:text-x-prime focus-within:text-x-prime outline-none">
                        {{ __('Brands') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.guest.categories') }}"
                        class="uppercase block w-full text-center text-x-black text-base lg:w-max font-x-core hover:text-x-prime focus-within:text-x-prime outline-none">
                        {{ __('Categories') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.guest.products') }}"
                        class="uppercase block w-full text-center text-x-black text-base lg:w-max font-x-core hover:text-x-prime focus-within:text-x-prime outline-none">
                        {{ __('Products') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.guest.cart') }}"
                        class="uppercase block w-full text-center text-x-black text-base lg:w-max font-x-core hover:text-x-prime focus-within:text-x-prime outline-none">
                        {{ __('Requests') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
