<aside id="menu" style="height: var(--vh)"
    class="w-full lg:w-[240px] h-screen fixed lg:sticky top-0 -left-full lg:left-0 rtl:left-auto rtl:-right-full lg:rtl:right-0 z-50 lg:z-0 transition-all duration-150 pointer-events-none lg:pointer-events-auto">
    <div class="bg-x-black-blur w-full h-full backdrop-blur-sm relative">
        <button x-toggle targets="#menu"
            properties="left-0, -left-full, rtl:right-0, rtl:-right-full, rtl:left-auto, pointer-events-none, lg:w-[240px], lg:w-0"
            class="text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur p-2 w-[42px] aspect-square flex items-center justify-center rounded-x-core absolute top-4 right-4 rtl:left-4 rtl:right-auto outline-none">
            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 0 48 48">
                <path
                    d="M12.45 37.65 10.35 35.55 21.9 24 10.35 12.45 12.45 10.35 24 21.9 35.55 10.35 37.65 12.45 26.1 24 37.65 35.55 35.55 37.65 24 26.1Z" />
            </svg>
        </button>
    </div>
    <nav
        class="w-[240px] lg:w-full h-full flex flex-col bg-x-white shadow-x-core absolute top-0 left-0 rtl:right-0 rtl:left-auto overflow-hidden">
        <div class="flex flex-col h-full gap-10 m-4">
            <header class="w-full flex items-center justify-center overflow-hidden">
                <img alt="logo-image" src="{{ asset('img/logo-black.png') }}?v={{ env('APP_VERSION') }}"
                    class="block w-40" />
            </header>
            <ul
                class="flex flex-col gap-4 flex-1 overflow-y-auto overflow-x-hidden border-e lg:border-none border-x-white">
                <li>
                    <ul class="w-full flex flex-col">
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.core.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.core.index') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-0)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M99-425v-356q0-32.025 24.194-56.512Q147.387-862 179-862h277v437H99Zm405-437h277q32.025 0 56.512 24.488Q862-813.025 862-781v197H504v-278Zm0 763v-436h358v356q0 31.613-24.488 55.806Q813.025-99 781-99H504ZM99-376h357v277H179q-31.613 0-55.806-24.194Q99-147.387 99-179v-197Z" />
                                </svg>
                                <span class="text-sm font-medium">{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="w-full flex flex-col">
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.categories.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ Core::route('categories') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-1)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="m264-572 178-288q6-10 17-15.5t22-5.5q11 0 21.375 5.289Q512.75-870.421 520-860l179 288q6 11 5.5 23.5t-5.625 23.948q-5.125 10.449-16.15 16.5Q671.7-502 659-502H302q-12.814 0-23.925-6.177-11.111-6.176-14.95-16.375Q257-536 256.5-548.5T264-572ZM726-39q-82.917 0-139.458-56.25Q530-151.5 530-234.588t56.662-140.75Q643.324-433 726.412-433t139.338 57.542Q922-317.917 922-235q0 82.083-56.958 139.042Q808.083-39 726-39ZM65-111v-257q0-18.775 12.625-32.388Q90.25-414 112-414h257q19.775 0 32.388 13.612Q414-386.775 414-368v257q0 21.75-12.612 34.375Q388.775-64 369-64H112q-21.75 0-34.375-12.625T65-111Z" />
                                </svg>
                                <span class="text-sm font-medium">{{ __('Categories') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.products.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ Core::route('products') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-2)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M191-99q-37.8 0-64.9-27.1Q99-153.2 99-192v-490q0-14.882 5-29.559 5-14.676 15-27.441l73-94q11.75-16.034 29.316-22.517Q238.882-862 259-862h443q18.085 0 35.664 6.483Q755.242-849.034 767-834l76 95q8 13.765 13.5 28.441Q862-695.882 862-681v489q0 38.8-27.394 65.9Q807.213-99 769-99H191Zm33-626h512l-36.409-46H259l-35 46Zm429 84H309v266q0 27 21 39.5t43 2.5l107-54 107 54q22 10 44-2.5t22-39.5v-266Z" />
                                </svg>
                                <span class="text-sm font-medium">{{ __('Products') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.brands.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ Core::route('brands') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-3)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                </svg>
                                <span class="text-sm font-medium">{{ __('Brands') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="w-full flex flex-col">
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.quotations.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ Core::route('quotations') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-4)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M445-243v17q0 9.8 7.6 16.4 7.6 6.6 16.4 6.6h23.833q9.567 0 15.867-7.2 6.3-7.2 6.3-16.8v-16h55q16.275 0 25.638-9.075Q605-261.15 605-276.752V-412q0-15.425-9.362-25.212Q586.275-447 569.752-447H425v-65h146q14.45 0 24.225-9.967 9.775-9.966 9.775-24.7 0-14.308-9.775-24.32Q585.45-581 571-581h-56v-17q0-8.8-7-15.9t-16-7.1h-23.833q-9.367 0-16.267 7.1-6.9 7.1-6.9 15.9v17h-55q-16.275 0-25.638 9.5Q355-562 355-547v135.248q0 16.027 9.362 25.39Q373.725-377 390.248-377H535v65H389q-14.45 0-24.225 9.805-9.775 9.806-9.775 24.3 0 15.345 10.062 25.12Q375.125-243 390-243h55ZM229-59q-35.775 0-63.388-26.912Q138-112.825 138-150v-660q0-37.588 27.612-64.794Q193.225-902 229-902h347l247 246v506q0 37.175-27.906 64.088Q767.188-59 731-59H229Zm325-751v130q0 20.75 13.325 33.375T600-634h131L554-810Z" />
                                </svg>
                                <span class="text-sm font-medium">{{ __('Quotations') }}</span>
                            </a>
                        </li>
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.requests.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ Core::route('requests') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-5)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M227-38q-58.917 0-97.958-39.75Q90-117.5 90-175v-100q0-19.65 13.312-32.825Q116.625-321 136-321h93v-546q0-8.5 6.5-11.25t12.794 3.544L277-846q5.455 7 16.227 6.5Q304-840 310-847l32-31q4.818-5 15.909-5Q369-883 374-878l30 31q4.818 7 15.955 7 11.136 0 17.045-7l32-31q4.273-5 15.409-5 11.136 0 17.591 5l30 31q5.727 7 16.864 7Q560-840 565-847l32-31q3.636-5 15.136-5T630-878l30 31q5.455 7 16.227 7Q687-840 693-847l31-31q4.545-5 16.045-5 11.5 0 16.955 5l31 31q4.818 7 15.955 7.5 11.136.5 17.045-6.5l30-29q5.118-6 12.559-3.042Q871-875.083 871-867v692q0 57.5-40.042 97.25Q790.917-38 734-38H227Zm505.5-92q18.5 0 31-12.885T776-174.6V-775H323v504h324q18.8 0 32.4 13.175Q693-244.65 693-225v50q0 19 10 32t29.5 13ZM405-674h162q11.8 0 20.4 8.456 8.6 8.456 8.6 20.316t-8.6 20.044Q578.8-617 567-617H405q-11.375 0-19.688-8.439-8.312-8.438-8.312-20 0-11.561 8.312-20.061Q393.625-674 405-674Zm0 132h162q11.8 0 20.4 8.375 8.6 8.376 8.6 20.116 0 11.741-8.6 20.125T567-485H405q-11.375 0-19.688-8.56-8.312-8.559-8.312-20.3 0-11.74 8.312-19.94Q393.625-542 405-542Zm284.421-75Q678-617 669.5-625.763t-8.5-19.5Q661-656 669.281-665q8.28-9 20-9 11.719 0 20.219 8.781 8.5 8.78 8.5 19.815 0 11.036-8.579 19.72t-20 8.684Zm0 127Q678-490 669.5-498.884t-8.5-19.8q0-10.916 8.281-19.616 8.28-8.7 20-8.7 11.719 0 20.219 8.7 8.5 8.7 8.5 19.616t-8.579 19.8q-8.579 8.884-20 8.884Z" />
                                </svg>
                                <span class="text-sm font-medium">{{ __('Requests') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="w-full flex flex-col">
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.users.index') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-lg text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ Core::route('users') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-6)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M68-130q-20.1 0-33.05-12.45Q22-154.9 22-174.708V-246q0-42.011 21.188-75.36 21.187-33.348 59.856-50.662Q178-404 238.469-419 298.938-434 363-434q66.062 0 126.031 15Q549-404 624-372q38.812 16.018 60.406 49.452Q706-289.113 706-246v71.708Q706-155 693.275-142.5T660-130H68Zm679 0q11-5 20.5-17.5T777-177v-67q0-65-32.5-108T659-432q60 10 113 24.5t88.88 31.939q34.958 18.329 56.539 52.945Q939-288 939-241v66.787q0 19.505-13.225 31.859Q912.55-130 893-130H747ZM364-494q-71.55 0-115.275-43.725Q205-581.45 205-652.5q0-71.05 43.725-115.275Q292.45-812 363.5-812q70.05 0 115.275 44.113Q524-723.775 524-653q0 71.55-45.112 115.275Q433.775-494 364-494Zm386-159q0 70.55-44.602 114.775Q660.796-494 591.035-494 578-494 567.5-495.5T543-502q26-27.412 38.5-65.107 12.5-37.696 12.5-85.599 0-46.903-12.5-83.598Q569-773 543-804q10.75-3.75 23.5-5.875T591-812q69.775 0 114.387 44.613Q750-722.775 750-653Z" />
                                </svg>
                                <span class="text-sm font-medium">{{ __('Users') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="w-full flex flex-col">
                        <li class="w-full min-w-max">
                            <a href="{{ route('views.core.patch') }}"
                                class="w-full flex gap-2 items-center p-1.5 outline-none rounded-sm text-x-black hover:bg-x-black-blur focus-within:bg-x-black-blur {{ request()->routeIs('views.core.patch') ? '!bg-x-black-blur' : '' }}">
                                <svg class="block w-5 h-5 pointer-events-none !text-[var(--color-7)]"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M291-405v21q0 13.033 7.983 21.017Q306.967-355 320-355t21.517-7.983Q350-370.967 350-384v-101q0-13.033-8.483-21.517Q333.033-515 320-515t-21.017 8.483Q291-498.033 291-485v20h-31q-13.033 0-21.017 8.483Q231-448.033 231-435q0 12.533 8.733 21.267Q248.467-405 261-405h30Zm149 0h260q13.033 0 21.517-8.733Q730-422.467 730-435t-8.483-21.267Q713.033-465 700-465H440q-12.733 0-21.367 8.483Q410-448.033 410-435q0 12.533 8.733 21.267Q427.467-405 440-405Zm230-181h30q13.033 0 21.517-9.233Q730-604.467 730-616.791q0-11.324-8.483-20.766Q713.033-647 700-647h-30v-20q0-11.733-8.483-20.867Q653.033-697 640-697t-21.017 9.133Q611-678.733 611-667v100q0 12.733 7.983 21.867Q626.967-536 640-536t21.517-9.133Q670-554.267 670-567v-19Zm-409 0h260q12.3 0 21.15-9.233 8.85-9.234 8.85-21.558 0-11.324-8.85-20.766Q533.3-647 521-647H260q-13.033 0-21.017 9.193Q231-628.615 231-616.791q0 12.324 8.733 21.558Q248.467-586 261-586ZM149-178q-37.45 0-64.225-26.775Q58-231.55 58-269v-501q0-37.863 26.775-64.931Q111.55-862 149-862h662q37.863 0 64.931 27.069Q903-807.863 903-770v501q0 37.45-27.069 64.225Q848.863-178 811-178H641v33q0 21-13.763 33.5Q613.475-99 595-99H366q-19.6 0-32.8-12.5Q320-124 320-145v-33H149Z" />
                                </svg>
                                <span class="text-sm font-medium">{{ __('System') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>
