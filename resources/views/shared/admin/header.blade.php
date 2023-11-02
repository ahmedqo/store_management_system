<header class="w-full bg-x-prime sticky top-0 z-[40]">
    <nav class="w-full flex items-center gap-2 p-2 px-4">
        <button id="trigger_menu" x-toggle targets="#menu"
            properties="left-0, -left-full, rtl:right-0, rtl:-right-full, rtl:left-auto, pointer-events-none, lg:w-[240px], lg:w-0"
            class="p-2 w-[42px] aspect-square flex items-center justify-center rounded-md text-x-white outline-none rtl:rotate-180 hover:bg-x-black-blur focus-within:bg-x-black-blur">
            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M129-215q-20.75 0-33.375-12.675Q83-240.351 83-261.175 83-280 95.625-293T129-306h458q19.75 0 32.375 13.175 12.625 13.176 12.625 32Q632-240 619.375-227.5 606.75-215 587-215H129Zm0-221q-20.75 0-33.375-13.175Q83-462.351 83-482.175 83-502 95.625-514.5 108.25-527 129-527h339q18.75 0 31.875 12.675Q513-501.649 513-481.825 513-462 499.875-449 486.75-436 468-436H129Zm0-218q-20.75 0-33.375-13.175Q83-680.351 83-700.175 83-720 95.625-733 108.25-746 129-746h458q19.75 0 32.375 13.175 12.625 13.176 12.625 33Q632-680 619.375-667 606.75-654 587-654H129Zm605 173 114 113q13 14 12.5 33T847-304q-15 14-33.5 14T782-304L637-450q-14-13-14-31t14-32l145-146q13-13 31.5-13t33.5 13q13 14 12.5 33T847-594L734-481Z" />
            </svg>
        </button>
        <div class="w-max flex items-center gap-1 ms-auto">
            <div class="w-max relative">
                <button x-toggle targets="#languages" properties="opacity-0, pointer-events-none, -translate-y-full"
                    class="p-2 w-[42px] aspect-square flex items-center justify-center rounded-md text-x-white outline-none hover:bg-x-black-blur focus-within:bg-x-black-blur">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M610-196 568.513-90.019Q566-78 555.452-71q-10.548 7-23.606 7Q510-64 499.5-80.963 489-97.927 497-118.094L654.571-537.15Q658-549 668-556.5q10-7.5 22-7.5h31.552q11.821 0 21.672 7T758-538l164 419q6 20.462-5.6 37.73Q904.799-64 884.273-64q-14.692 0-26.733-7.76t-15.536-22.576L808.585-196H610Zm22-72h148l-73.054-202H705l-73 202ZM355.135-397l-179.34 178.842Q162.86-206 146.206-206.5q-16.654-.5-27.93-11Q107-229 108-246.689q1-17.69 11.654-28.321L303-458q-39.6-45.818-70.8-92.409Q201-597 179-646h90q16 34 38.329 64.567 22.328 30.566 48.274 63.433Q403-567 434.628-619.861 466.256-672.721 489-730H63.857q-17.753 0-29.305-12.289Q23-754.579 23-771.982q0-17.404 12.35-29.318 12.35-11.914 29.895-11.914h248.731v-41.893q0-17.529 11.748-29.211Q337.471-896 355.098-896t29.637 11.682q12.011 11.682 12.011 29.211v41.893h249.548q17.685 0 29.696 11.768Q688-789.679 688-771.895q0 17.509-12.282 29.702Q663.436-730 645.759-730h-74.975Q548-656 510-587.5T416-457l102 103-29.389 83.933L355.135-397Z" />
                    </svg>
                </button>
                <ul id="languages"
                    class="w-max shadow-x-drop flex flex-col bg-x-white rounded-b-x-core overflow-hidden absolute right-0 rtl:left-0 rtl:right-auto top-full mt-2 transition-all duration-150 z-20 opacity-0 pointer-events-none -translate-y-full origin-top-right rtl:origin-top-left">
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
            <div class="w-max relative">
                <button x-toggle targets="#settings" properties="opacity-0, pointer-events-none, -translate-y-full"
                    class="p-2 w-[42px] aspect-square flex items-center justify-center rounded-md text-x-white outline-none hover:bg-x-black-blur focus-within:bg-x-black-blur">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M408-59q-18 0-31-10.5T363-98l-15-94q-14-4-31-14t-28-19l-86 41q-15 6-32.5 1.5T144-204L72-332q-10-16-5-32.5T85-391l80-59q-1-5-1-14.5v-30q0-8.5 1-15.5l-81-58q-13-11-17.5-27.5T72-628l72-127q9-16 26.5-21t32.5 0l88 41q10-7 27-17t30-14l15-98q1-16 14.5-27t31.5-11h143q17 0 30.5 11t15.5 27l14 97q15 4 31.5 14t27.5 18l86-41q15-5 32.5 0t26.5 21l73 126q9 16 5 33t-19 28l-81 55q1 8 2.5 17t1.5 16q0 7-1.5 15.5T794-449l81 58q13 10 18.5 26.5T890-332l-74 128q-10 17-27 21.5t-32-1.5l-86-41q-11 9-28.5 19.5T613-192l-15 94q-2 18-15 28.5T552-59H408Zm71-294q53 0 90-37t37-90q0-52-37-89.5T479-607q-54 0-90.5 37.5T352-480q0 53 36.5 90t90.5 37Z" />
                    </svg>
                </button>
                <ul id="settings"
                    class="w-[120px] rtl:w-[150px] shadow-x-drop flex flex-col bg-x-white rounded-b-x-core overflow-hidden absolute right-0 rtl:left-0 rtl:right-auto top-full mt-2 transition-all duration-150 z-20 opacity-0 pointer-events-none -translate-y-full origin-top-right rtl:origin-top-left">
                    <li class="w-full">
                        <a href="{{ route('views.profile.patch') }}"
                            class="w-full flex gap-2 items-center p-1.5 outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.profile.patch') ? '!bg-x-black-blur' : '' }}">
                            <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-sys-1)]"
                                fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M310-279h340v-23q0-45.622-44.534-69.811Q560.931-396 479.966-396 399-396 354.5-371.811T310-302v23Zm170.044-184q33.431 0 55.693-22.975Q558-508.95 558-542.212q0-33.263-22.343-55.525Q513.314-620 479.832-620t-55.657 22.431Q402-575.139 402-542t22.307 56.069Q446.613-463 480.044-463ZM150-99q-37.175 0-64.088-26.594Q59-152.188 59-190v-495q0-36.588 26.912-64.294Q112.825-777 150-777h133l55-65q12.136-16 30.508-24 18.373-8 38.492-8h148q18.125 0 36.562 8Q610-858 623-842l55 65h132q37.225 0 64.613 27.706Q902-721.588 902-685v495q0 37.812-27.387 64.406Q847.225-99 810-99H150Z" />
                            </svg>
                            <span class="text-sm font-medium">{{ __('Profile') }}</span>
                        </a>
                    </li>
                    <li class="w-full">
                        <a href="{{ route('views.password.patch') }}"
                            class="w-full flex gap-2 items-center p-1.5 outline-none text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.password.patch') ? '!bg-x-black-blur' : '' }}">
                            <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-sys-0)]"
                                fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M229-62q-36.775 0-63.888-27.112Q138-116.225 138-153v-415q0-38.588 27.112-65.294Q192.225-660 229-660h53v-74q0-83.965 57.921-142.483Q397.843-935 479.731-935q81.889 0 140.079 58.517Q678-817.965 678-734v74h53q37.188 0 64.594 26.706Q823-606.588 823-568v415q0 36.775-27.406 63.888Q768.188-62 731-62H229Zm251.248-223Q512-285 533.5-306.615q21.5-21.616 21.5-51.969Q555-388 533.252-412q-21.748-24-53.5-24T426.5-412.064Q405-388.128 405-358.42q0 30.12 21.748 51.77 21.748 21.65 53.5 21.65ZM373-660h214v-73.769q0-47.731-30.973-78.481Q525.054-843 480.235-843q-44.818 0-76.027 30.75Q373-781.5 373-733.769V-660Z" />
                            </svg>
                            <span class="text-sm font-medium">{{ __('Password') }}</span>
                        </a>
                    </li>
                    <li class="w-full">
                        <form action="{{ route('actions.close.index') }}" method="POST">
                            @csrf
                            <button type="submit" title="clear"
                                class="w-full flex gap-2 items-center p-1.5 outline-none text-x-black hover:bg-x-shade hover:bg-opacity-20 focus-within:bg-x-shade focus-within:bg-opacity-20">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-sys-2)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M635-306q-13-15-13.5-33.125T635-371l64-63H409q-19.775 0-32.388-13.36Q364-460.719 364-479.86q0-20.14 12.612-32.64Q389.225-525 409-525h288l-66-67q-13-12.267-12.5-30.081t14.714-31.866Q644.661-666 664.705-665.5 684.75-665 699-653l141 142q4.909 6.327 8.955 15.008Q853-487.311 853-478.676q0 8.636-4.045 17.106Q844.909-453.1 840-448L699.006-305.089Q686-292 668-293t-33-13ZM181-97q-38.1 0-65.05-26.975Q89-150.95 89-188v-584q0-37.463 26.95-64.731Q142.9-864 181-864h251q20.2 0 33.1 13.763 12.9 13.763 12.9 32.816 0 20.053-12.9 32.737Q452.2-772 432-772H181v584h251q20.2 0 33.1 12.675 12.9 12.676 12.9 32.816 0 19.141-12.9 32.325Q452.2-97 432-97H181Z" />
                                </svg>
                                <span class="text-sm font-medium">{{ __('Logout') }}</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
