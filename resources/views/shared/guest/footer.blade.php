<footer>
    <div class="container mx-auto p-4 flex flex-col md:flex-row md:flex-wrap gap-10 md:gap-4 justify-between">
        <div class="w-full md:w-max md:items-start flex items-center flex-col gap-4">
            <h2
                class="text-x-black text-xl md:text-2xl font-x-core after:content-[''] after:block after:mx-auto md:after:ms-0 after:w-12 after:h-[4px] after:bg-x-prime">
                {{ ucwords(__('Quick links')) }}
            </h2>
            <ul class="w-full flex flex-col items-center gap-2 md:items-start">
                <li>
                    <a href="{{ route('views.guest.brands') }}"
                        class="text-x-black text-sm font-x-core hover:text-x-prime focus-within:text-x-prime outline-none">
                        {{ __('Brands') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.guest.categories') }}"
                        class="text-x-black text-sm font-x-core hover:text-x-prime focus-within:text-x-prime outline-none">
                        {{ __('Categories') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.guest.products') }}"
                        class="text-x-black text-sm font-x-core hover:text-x-prime focus-within:text-x-prime outline-none">
                        {{ __('Products') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('views.guest.cart') }}"
                        class="text-x-black text-sm font-x-core hover:text-x-prime focus-within:text-x-prime outline-none">
                        {{ __('Requests') }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="w-full md:w-max md:items-start flex items-center flex-col gap-4">
            <h2
                class="text-x-black text-xl md:text-2xl font-x-core after:content-[''] after:block after:mx-auto md:after:ms-0 after:w-12 after:h-[4px] after:bg-x-prime">
                {{ ucwords(__('Comercial details')) }}
            </h2>
            <ul class="w-full flex flex-col items-center gap-4 md:gap-2 md:items-start">
                <li class="w-full flex flex-col md:flex-row flex-wrap gap-2 md:gap-4 items-center">
                    <svg class="w-6 h-6 text-x-prime pointer-events-none" viewBox="0 -960 960 960" fill="currentColor">
                        <path
                            d="M479.511-83Q468-83 454.91-87q-13.089-4-22.91-13-48-38-99.503-89.226t-94.5-109.5Q195-357 167-421.938 139-486.875 139-555q0-159.719 103.253-253.86Q345.506-903 480-903q134.494 0 238.247 94.14Q822-714.719 822-555q0 68.125-28.5 133.062Q765-357 722.003-298.726t-94.5 109.5Q576-138 530-100q-11.955 9-25.466 13-13.512 4-25.023 4Zm.622-401Q512-484 534.5-506.133q22.5-22.133 22.5-54T534.367-614.5q-22.633-22.5-54.5-22.5T426-614.367q-22 22.633-22 54.5T426.133-506q22.133 22 54 22Z" />
                    </svg>
                    <div class="flex-1 flex flex-col">
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                    </div>
                </li>
                <li class="w-full flex flex-col md:flex-row flex-wrap gap-2 md:gap-4 items-center">
                    <svg class="w-6 h-6 text-x-prime pointer-events-none" viewBox="0 -960 960 960" fill="currentColor">
                        <path
                            d="M479-59q-85.352 0-162.749-32.73-77.398-32.731-134.804-89.841Q124.04-238.68 91.52-315.966 59-393.251 59-479.946q0-86.694 32.73-163.947 32.731-77.254 89.683-134.713 56.953-57.459 134.312-90.427Q393.084-902 479.862-902t164.15 33.101q77.371 33.1 134.756 90.13 57.384 57.029 90.308 134.647Q902-566.504 902-481v50.504q0 61.144-44.946 102.82Q812.107-286 750-286q-41.33 0-74.165-19Q643-324 626-358q-25 37-63.808 54.5T480.306-286q-80.721 0-138.014-56.561Q285-399.123 285-480.481q0-82.167 57.013-138.843Q399.026-676 479.625-676q80.6 0 137.987 56.68Q675-562.64 675-480v43.933q0 30.964 22.067 51.015Q719.133-365 749.977-365q29.41 0 50.216-20.052Q821-405.103 821-436.067V-481q0-141.7-99.703-240.85Q621.595-821 479.819-821q-141.775 0-241.297 99.703Q139-621.595 139-479.819q0 141.775 99.15 241.297Q337.3-139 479-139h176q17.15 0 28.075 11.479T694-99.017q0 17.649-10.925 28.833Q672.15-59 655-59H479Zm1.353-306Q527-365 561.5-399.544q34.5-34.544 34.5-80.75Q596-528 561.147-562.5t-81.5-34.5Q433-597 398.5-562.206q-34.5 34.794-34.5 82.5 0 46.206 34.853 80.456t81.5 34.25Z" />
                    </svg>
                    <div class="flex-1 flex flex-col">
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                    </div>
                </li>
                <li class="w-full flex flex-col md:flex-row flex-wrap gap-2 md:gap-4 items-center">
                    <svg class="w-6 h-6 text-x-prime pointer-events-none" viewBox="0 -960 960 960" fill="currentColor">
                        <path
                            d="M793-99q-121 0-244.5-58T321-319Q216-423 157.5-548T99-792q0-29 20-49.5t49-20.5h135q31 0 51 16.5t26 47.5l27 106q2 26-3.5 47T383-611l-102 94q20 36 46.5 68.5T385-387q33 36 67 61.5t69 44.5l99-99q16-18 37.5-24.5t46.5-.5l95 22q30 9 46.5 29t16.5 50v136q0 29-20.5 49T793-99Z" />
                    </svg>
                    <div class="flex-1 flex flex-col">
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="w-full md:w-max md:items-start flex items-center flex-col gap-4">
            <h2
                class="text-x-black text-xl md:text-2xl font-x-core after:content-[''] after:block after:mx-auto md:after:ms-0 after:w-12 after:h-[4px] after:bg-x-prime">
                {{ ucwords(__('Support details')) }}
            </h2>
            <ul class="w-full flex flex-col items-center gap-4 md:gap-2 md:items-start">
                <li class="w-full flex flex-col md:flex-row flex-wrap gap-2 md:gap-4 items-center">
                    <svg class="w-6 h-6 text-x-prime pointer-events-none" viewBox="0 -960 960 960" fill="currentColor">
                        <path
                            d="M479.511-83Q468-83 454.91-87q-13.089-4-22.91-13-48-38-99.503-89.226t-94.5-109.5Q195-357 167-421.938 139-486.875 139-555q0-159.719 103.253-253.86Q345.506-903 480-903q134.494 0 238.247 94.14Q822-714.719 822-555q0 68.125-28.5 133.062Q765-357 722.003-298.726t-94.5 109.5Q576-138 530-100q-11.955 9-25.466 13-13.512 4-25.023 4Zm.622-401Q512-484 534.5-506.133q22.5-22.133 22.5-54T534.367-614.5q-22.633-22.5-54.5-22.5T426-614.367q-22 22.633-22 54.5T426.133-506q22.133 22 54 22Z" />
                    </svg>
                    <div class="flex-1 flex flex-col">
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                    </div>
                </li>
                <li class="w-full flex flex-col md:flex-row flex-wrap gap-2 md:gap-4 items-center">
                    <svg class="w-6 h-6 text-x-prime pointer-events-none" viewBox="0 -960 960 960" fill="currentColor">
                        <path
                            d="M479-59q-85.352 0-162.749-32.73-77.398-32.731-134.804-89.841Q124.04-238.68 91.52-315.966 59-393.251 59-479.946q0-86.694 32.73-163.947 32.731-77.254 89.683-134.713 56.953-57.459 134.312-90.427Q393.084-902 479.862-902t164.15 33.101q77.371 33.1 134.756 90.13 57.384 57.029 90.308 134.647Q902-566.504 902-481v50.504q0 61.144-44.946 102.82Q812.107-286 750-286q-41.33 0-74.165-19Q643-324 626-358q-25 37-63.808 54.5T480.306-286q-80.721 0-138.014-56.561Q285-399.123 285-480.481q0-82.167 57.013-138.843Q399.026-676 479.625-676q80.6 0 137.987 56.68Q675-562.64 675-480v43.933q0 30.964 22.067 51.015Q719.133-365 749.977-365q29.41 0 50.216-20.052Q821-405.103 821-436.067V-481q0-141.7-99.703-240.85Q621.595-821 479.819-821q-141.775 0-241.297 99.703Q139-621.595 139-479.819q0 141.775 99.15 241.297Q337.3-139 479-139h176q17.15 0 28.075 11.479T694-99.017q0 17.649-10.925 28.833Q672.15-59 655-59H479Zm1.353-306Q527-365 561.5-399.544q34.5-34.544 34.5-80.75Q596-528 561.147-562.5t-81.5-34.5Q433-597 398.5-562.206q-34.5 34.794-34.5 82.5 0 46.206 34.853 80.456t81.5 34.25Z" />
                    </svg>
                    <div class="flex-1 flex flex-col">
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                    </div>
                </li>
                <li class="w-full flex flex-col md:flex-row flex-wrap gap-2 md:gap-4 items-center">
                    <svg class="w-6 h-6 text-x-prime pointer-events-none" viewBox="0 -960 960 960" fill="currentColor">
                        <path
                            d="M793-99q-121 0-244.5-58T321-319Q216-423 157.5-548T99-792q0-29 20-49.5t49-20.5h135q31 0 51 16.5t26 47.5l27 106q2 26-3.5 47T383-611l-102 94q20 36 46.5 68.5T385-387q33 36 67 61.5t69 44.5l99-99q16-18 37.5-24.5t46.5-.5l95 22q30 9 46.5 29t16.5 50v136q0 29-20.5 49T793-99Z" />
                    </svg>
                    <div class="flex-1 flex flex-col">
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="w-full md:w-max md:items-start flex items-center flex-col gap-4">
            <h2
                class="text-x-black text-xl md:text-2xl font-x-core after:content-[''] after:block after:mx-auto md:after:ms-0 after:w-12 after:h-[4px] after:bg-x-prime">
                {{ ucwords(__('Contact details')) }}
            </h2>
            <ul class="w-full flex flex-col items-center gap-4 md:gap-2 md:items-start">
                <li class="w-full flex flex-col md:flex-row flex-wrap gap-2 md:gap-4 items-center">
                    <svg class="w-6 h-6 text-x-prime pointer-events-none" viewBox="0 -960 960 960" fill="currentColor">
                        <path
                            d="M479.511-83Q468-83 454.91-87q-13.089-4-22.91-13-48-38-99.503-89.226t-94.5-109.5Q195-357 167-421.938 139-486.875 139-555q0-159.719 103.253-253.86Q345.506-903 480-903q134.494 0 238.247 94.14Q822-714.719 822-555q0 68.125-28.5 133.062Q765-357 722.003-298.726t-94.5 109.5Q576-138 530-100q-11.955 9-25.466 13-13.512 4-25.023 4Zm.622-401Q512-484 534.5-506.133q22.5-22.133 22.5-54T534.367-614.5q-22.633-22.5-54.5-22.5T426-614.367q-22 22.633-22 54.5T426.133-506q22.133 22 54 22Z" />
                    </svg>
                    <div class="flex-1 flex flex-col">
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                    </div>
                </li>
                <li class="w-full flex flex-col md:flex-row flex-wrap gap-2 md:gap-4 items-center">
                    <svg class="w-6 h-6 text-x-prime pointer-events-none" viewBox="0 -960 960 960" fill="currentColor">
                        <path
                            d="M479-59q-85.352 0-162.749-32.73-77.398-32.731-134.804-89.841Q124.04-238.68 91.52-315.966 59-393.251 59-479.946q0-86.694 32.73-163.947 32.731-77.254 89.683-134.713 56.953-57.459 134.312-90.427Q393.084-902 479.862-902t164.15 33.101q77.371 33.1 134.756 90.13 57.384 57.029 90.308 134.647Q902-566.504 902-481v50.504q0 61.144-44.946 102.82Q812.107-286 750-286q-41.33 0-74.165-19Q643-324 626-358q-25 37-63.808 54.5T480.306-286q-80.721 0-138.014-56.561Q285-399.123 285-480.481q0-82.167 57.013-138.843Q399.026-676 479.625-676q80.6 0 137.987 56.68Q675-562.64 675-480v43.933q0 30.964 22.067 51.015Q719.133-365 749.977-365q29.41 0 50.216-20.052Q821-405.103 821-436.067V-481q0-141.7-99.703-240.85Q621.595-821 479.819-821q-141.775 0-241.297 99.703Q139-621.595 139-479.819q0 141.775 99.15 241.297Q337.3-139 479-139h176q17.15 0 28.075 11.479T694-99.017q0 17.649-10.925 28.833Q672.15-59 655-59H479Zm1.353-306Q527-365 561.5-399.544q34.5-34.544 34.5-80.75Q596-528 561.147-562.5t-81.5-34.5Q433-597 398.5-562.206q-34.5 34.794-34.5 82.5 0 46.206 34.853 80.456t81.5 34.25Z" />
                    </svg>
                    <div class="flex-1 flex flex-col">
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                    </div>
                </li>
                <li class="w-full flex flex-col md:flex-row flex-wrap gap-2 md:gap-4 items-center">
                    <svg class="w-6 h-6 text-x-prime pointer-events-none" viewBox="0 -960 960 960" fill="currentColor">
                        <path
                            d="M793-99q-121 0-244.5-58T321-319Q216-423 157.5-548T99-792q0-29 20-49.5t49-20.5h135q31 0 51 16.5t26 47.5l27 106q2 26-3.5 47T383-611l-102 94q20 36 46.5 68.5T385-387q33 36 67 61.5t69 44.5l99-99q16-18 37.5-24.5t46.5-.5l95 22q30 9 46.5 29t16.5 50v136q0 29-20.5 49T793-99Z" />
                    </svg>
                    <div class="flex-1 flex flex-col">
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                        <a href="" class="text-x-black text-sm font-x-core">
                            XXXX XXXX XXXX XXXX
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        @if (env('FACBOOK_LINK') ||
                env('INSTAGRAM_LINK') ||
                env('TWITTER_LINK') ||
                env('TELEGRAM_LINK') ||
                env('TIKTOK_LINK') ||
                env('YOUTUBE_LINK'))
            <div
                class="w-full flex flex-col gap-6 mt-2 before:content-[''] before:mx-auto before:block before:w-1/5 before:h-[4px] before:bg-x-prime">
                <ul class="flex gap-2 items-center w-max mx-auto">
                    @if (env('FACBOOK_LINK'))
                        <li>
                            <a href=""
                                class="text-x-prime hover:text-x-acent focus-within:text-x-acent outline-none">
                                <svg class="w-8 h-8 pointer-events-none" fill="currentColor" viewBox="0 0 320 512">
                                    <path
                                        d="m279.14 288 14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if (env('INSTAGRAM_LINK'))
                        <li>
                            <a href=""
                                class="text-x-prime hover:text-x-acent focus-within:text-x-acent outline-none">
                                <svg class="w-8 h-8 pointer-events-none" fill="currentColor" viewBox="0 0 1024 1024">
                                    <path
                                        d="M512 378.7c-73.4 0-133.3 59.9-133.3 133.3S438.6 645.3 512 645.3 645.3 585.4 645.3 512 585.4 378.7 512 378.7zM911.8 512c0-55.2.5-109.9-2.6-165-3.1-64-17.7-120.8-64.5-167.6-46.9-46.9-103.6-61.4-167.6-64.5-55.2-3.1-109.9-2.6-165-2.6-55.2 0-109.9-.5-165 2.6-64 3.1-120.8 17.7-167.6 64.5C132.6 226.3 118.1 283 115 347c-3.1 55.2-2.6 109.9-2.6 165s-.5 109.9 2.6 165c3.1 64 17.7 120.8 64.5 167.6 46.9 46.9 103.6 61.4 167.6 64.5 55.2 3.1 109.9 2.6 165 2.6 55.2 0 109.9.5 165-2.6 64-3.1 120.8-17.7 167.6-64.5 46.9-46.9 61.4-103.6 64.5-167.6 3.2-55.1 2.6-109.8 2.6-165zM512 717.1c-113.5 0-205.1-91.6-205.1-205.1S398.5 306.9 512 306.9 717.1 398.5 717.1 512 625.5 717.1 512 717.1zm213.5-370.7c-26.5 0-47.9-21.4-47.9-47.9s21.4-47.9 47.9-47.9 47.9 21.4 47.9 47.9a47.84 47.84 0 0 1-47.9 47.9z" />
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if (env('TWITTER_LINK'))
                        <li>
                            <a href=""
                                class="text-x-prime hover:text-x-acent focus-within:text-x-acent outline-none">
                                <svg class="w-8 h-8 pointer-events-none" fill="currentColor" viewBox="0 0 512 512">
                                    <path
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if (env('TELEGRAM_LINK'))
                        <li>
                            <a href=""
                                class="text-x-prime hover:text-x-acent focus-within:text-x-acent outline-none">
                                <svg class="w-8 h-8 pointer-events-none" fill="currentColor" viewBox="0 0 496 512">
                                    <path
                                        d="M248 8C111.033 8 0 119.033 0 256s111.033 248 248 248 248-111.033 248-248S384.967 8 248 8Zm114.952 168.66c-3.732 39.215-19.881 134.378-28.1 178.3-3.476 18.584-10.322 24.816-16.948 25.425-14.4 1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25 5.342-39.5 3.652-3.793 67.107-61.51 68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608 69.142-14.845 10.194-26.894 9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7 18.45-13.7 108.446-47.248 144.628-62.3c68.872-28.647 83.183-33.623 92.511-33.789 2.052-.034 6.639.474 9.61 2.885a10.452 10.452 0 0 1 3.53 6.716 43.765 43.765 0 0 1 .417 9.769Z" />
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if (env('TIKTOK_LINK'))
                        <li>
                            <a href=""
                                class="text-x-prime hover:text-x-acent focus-within:text-x-acent outline-none">
                                <svg class="w-8 h-8 pointer-events-none" fill="currentColor" viewBox="0 0 448 512">
                                    <path
                                        d="M448 209.91a210.06 210.06 0 0 1-122.77-39.25v178.72A162.55 162.55 0 1 1 185 188.31v89.89a74.62 74.62 0 1 0 52.23 71.18V0h88a121.18 121.18 0 0 0 1.86 22.17A122.18 122.18 0 0 0 381 102.39a121.43 121.43 0 0 0 67 20.14Z" />
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if (env('YOUTUBE_LINK'))
                        <li>
                            <a href=""
                                class="text-x-prime hover:text-x-acent focus-within:text-x-acent outline-none">
                                <svg class="w-8 h-8 pointer-events-none" fill="currentColor" viewBox="0 0 1024 1024">
                                    <path
                                        d="M941.3 296.1a112.3 112.3 0 0 0-79.2-79.3C792.2 198 512 198 512 198s-280.2 0-350.1 18.7A112.12 112.12 0 0 0 82.7 296C64 366 64 512 64 512s0 146 18.7 215.9c10.3 38.6 40.7 69 79.2 79.3C231.8 826 512 826 512 826s280.2 0 350.1-18.8c38.6-10.3 68.9-40.7 79.2-79.3C960 658 960 512 960 512s0-146-18.7-215.9zM423 646V378l232 133-232 135z" />
                                </svg>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        @endif
    </div>
</footer>
