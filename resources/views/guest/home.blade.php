@extends('shared.guest.base')
@section('title', __('Home'))

@section('header')
    <div class="w-full p-4 container mx-auto flex flex-col lg:flex-row relative items-center overflow-hidden">
        <div data-aos="zoom-in-down" data-aos-delay="500"
            class="w-11/12 lg:w-[42%] lg:block -mt-28 sm:-mt-36 lg:mt-0 lg:absolute lg:left-4 rtl:lg:left-auto rtl:lg:right-4 !lg:top-1/2 lg:-translate-y-1/2 z-[1]">
            <h1 class="uppercase font-x-core text-x-black text-3xl sm:text-4xl lg:text-[3.19rem] !leading-[1] mb-4">
                {{ __('italian elegance for africa') }}
            </h1>
            <div style="background: radial-gradient(var(--acent), var(--prime))"
                class="w-full p-8 rounded-x-core shadow-x-core">
                <p class="text-lg font-medium text-x-black mb-6 text-justify">
                    {{ __('Discover the essence of Italian craftsmanship. Our products reflect the elegance and durability that Italian artistry is renowned for. Explore our curated collection and transform your spaces with a touch of Italian excellence.') }}
                </p>
                <a href="{{ route('views.guest.products') }}"
                    class="block w-max bg-x-white px-8 py-3 text-lg font-x-core rounded-md text-x-black hover:bg-x-acent focus-within:bg-x-acent">
                    {{ __('Explore') }}
                </a>
            </div>
        </div>
        <div data-aos="fade-{{ Core::lang('ar') ? 'right' : 'left' }}"
            class="w-full lg:w-[70%] lg:block aspect-[12/9] md:aspect-[16/12] xl:aspect-video overflow-hidden rounded-x-core bg-x-white bg-opacity-30 lg:ms-auto order-[-1] bg-center bg-no-repeat bg-cover border border-x-black-blur">
            <div id="slide" class="w-full h-full">
                <ul class="w-full h-full">
                    @foreach ($slides->reverse() as $row)
                        <li class="w-full h-full flex items-center justify-center">
                            <img src="{{ Core::files(Core::SLIDE)->get($row->name) }}"
                                alt="slide_image_{{ $loop->index + 1 }}" class="block w-full h-full object-cover" />
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="w-full flex flex-col gap-6 lg:gap-10 p-4 overflow-hidden">
        @if ($products->count())
            <section class="w-full flex flex-col gap-4 lg:gap-6">
                <div data-aos="zoom-up" class="w-full flex flex-col items-center">
                    <h3 class="text-md lg:text-lg text-x-prime font-x-core">{{ ucwords(__('Quick pick')) }}</h3>
                    <h3 class="text-2xl lg:text-4xl text-x-black font-x-core">{{ ucwords(__('Latest goods')) }}</h3>
                </div>
                <div class="w-[calc(100%+2rem)] -ms-4">
                    <div id="products" class="w-full">
                        <ul class="w-full h-full">
                            @foreach ($products as $row)
                                <li data-aos="zoom-dowm" data-aos-delay="{{ $loop->index * 300 + 100 }}" class="p-3">
                                    <div class="w-full flex flex-col">
                                        <a href="{{ route('views.guest.product', $row->slug) }}"
                                            class="relative group overflow-hidden aspect-[12/9] rounded-x-core bg-x-black-blur flex items-center justify-center border border-x-black-blur">
                                            <img src="{{ Core::files(Core::PRODUCT)->get($row->Files->first()->name) }}"
                                                alt="{{ $row->slug }}_image_1"
                                                class="block w-full h-full object-cover transition-transform group-hover:scale-150 group-focus:scale-150" />
                                            <div
                                                class="bg-x-black-blur text-x-white opacity-0 group-hover:opacity-100 group-focus:opacity-100 pointer-events-none transition-opacity w-full h-full absolute inset-0 flex items-center justify-center backdrop-blur-sm">
                                                <svg fill="currentcolor" viewBox="0 -960 960 960"
                                                    class="block w-12 h-12 lg:w-20 lg:h-20 pointer-events-none">
                                                    <path
                                                        d="M480.294-333Q550-333 598.5-381.794t48.5-118.5Q647-570 598.206-618.5t-118.5-48.5Q410-667 361.5-618.206t-48.5 118.5Q313-430 361.794-381.5t118.5 48.5Zm-.412-71q-39.465 0-67.674-28.326Q384-460.652 384-500.118q0-39.465 28.326-67.674Q440.652-596 480.118-596q39.465 0 67.674 28.326Q576-539.348 576-499.882q0 39.465-28.326 67.674Q519.348-404 479.882-404ZM480-180q-143.61 0-260.805-79T37.145-467.077q-3.945-5.987-6.045-14.901-2.1-8.915-2.1-17.824 0-8.909 2.1-18.178 2.1-9.27 6.045-16.943 64.834-126.779 182.04-205.928Q336.39-820 480-820t260.815 79.149q117.206 79.149 182.04 205.928 3.945 7.673 6.045 16.588 2.1 8.914 2.1 17.823t-2.1 18.179q-2.1 9.269-6.045 15.256Q858-338 740.805-259 623.61-180 480-180Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </a>
                                        <h4
                                            class="text-x-black text-base lg:text-lg font-x-core text-center shadow-x-core p-4 rounded-x-core bg-x-white w-11/12 mx-auto -mt-6 z-[1]">
                                            {{ ucwords($row->name) }}
                                        </h4>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endif

        <section class="w-full flex flex-col lg:flex-row gap-8 lg:gap-6">
            <div data-aos="fade-{{ Core::lang('ar') ? 'left' : 'right' }}" class="w-full lg:flex-[1] relative">
                <div style="background-image: url({{ asset('img/about.jpg') }})"
                    class="w-full h-full aspect-[12/9] lg:w-[calc(100%-1rem)] lg:aspect-auto lg:me-4 rounded-x-core bg-x-white overflow-hidden bg-no-repeat bg-cover bg-center border border-x-black-blur">
                </div>
                <div style="background: radial-gradient(var(--acent), var(--prime))"
                    class="w-40 lg:w-8 rounded-x-core shadow-x-core h-8 lg:h-40 absolute -bottom-4 lg:bottom-auto lg:top-10 right-4 lg:right-0 rtl:right-auto rtl:left-4 rtl:lg:right-auto rtl:lg:left-0">
                </div>
            </div>
            <div class="w-full lg:flex-[1] flex flex-col gap-4 lg:my-4">
                <h2 data-aos="fade-{{ Core::lang('ar') ? 'right' : 'left' }}" data-aos-delay="100"
                    class="uppercase font-x-core text-x-black text-4xl sm:text-5xl lg:text-[3.19rem] leading-[1] mb-6">
                    {{ __('who are we') }}
                </h2>
                <p data-aos="fade-{{ Core::lang('ar') ? 'right' : 'left' }}" data-aos-delay="300"
                    class="text-base font-medium text-x-black text-justify">
                    {{ __('At ITALMENARA, we are passionate about bringing the essence of Italian craftsmanship to the African continent. Our journey began with a vision to offer premium doors, windows, and more that embody the time-honored tradition of Italian artistry. With a deep appreciation for quality, style, and enduring beauty, we meticulously curate and import the finest products directly from Italy.') }}
                </p>
                <p data-aos="fade-{{ Core::lang('ar') ? 'right' : 'left' }}" data-aos-delay="500"
                    class="text-base font-medium text-x-black text-justify">
                    {{ __('Our commitment is to provide you with access to a world of Italian elegance right here in Africa. We understand that your spaces, whether residential or commercial, deserve nothing but the best. That\'s why we offer a carefully selected collection that marries form and function, transforming your surroundings into expressions of sophistication.') }}
                </p>
            </div>
        </section>

        @if ($categories->count() > 2)
            {{-- <div
                class="
                    grid-rows-1 grid-cols-2 grid-rows-2
                    aspect-[12/9] lg:aspect-[32/9]  aspect-[12/9] lg:aspect-none lg:row-span-2  aspect-[32/9] col-span-2 lg:col-span-1

                    grid-cols-2 lg:grid-cols-5
                    aspect-[12/9] lg:aspect-square lg:col-span-2  aspect-[12/9] lg:aspect-[32/9] lg:col-span-3  aspect-[12/9] lg:aspect-[32/9] lg:col-span-3  aspect-[12/9] lg:aspect-square lg:col-span-2
                    
                    grid-cols-2 lg:grid-cols-3 lg:grid-row-2
                    aspect-[12/9]  aspect-[12/9] lg:aspect-none lg:row-span-2  col-span-2 lg:col-span-1 aspect-[32/9] lg:aspect-[12/9]  aspect-[12/9]  aspect-[12/9]
                ">
            </div> --}}
            <section class="w-full grid gap-4 lg:gap-6 {{ $class['parent'] }}">
                @foreach ($categories as $row)
                    <a data-aos="flip-{{ Core::lang('ar') ? 'left' : 'right' }}"
                        data-aos-delay="{{ $loop->index * 300 + 100 }}"
                        href="{{ route('views.guest.products', [
                            'category' => $row->slug,
                        ]) }}"
                        class="relative w-full h-full group overflow-hidden rounded-x-core bg-x-white flex items-center justify-center border border-x-black-blur {{ $class['children'][$loop->index] }}">
                        <img src="{{ Core::files(Core::CATEGORY)->get($row->file) }}" alt="{{ $row->slug }}_image"
                            class="block w-full h-full object-cover scale-110 transition-transform group-hover:scale-150 group-focus:scale-150" />
                        <div
                            class="bg-x-black-blur text-x-white opacity-0 group-hover:opacity-100 group-focus:opacity-100 pointer-events-none transition-opacity w-full h-full absolute inset-0 flex items-center justify-center p-4 backdrop-blur-sm">
                            <h4 style="text-shadow: 0 0 2px var(--black)"
                                class="text-2xl lg:text-3xl font-x-core text-center">
                                {{ ucwords($row->name) }}
                            </h4>
                        </div>
                    </a>
                @endforeach
            </section>
        @endif

        <section class="w-full flex flex-col lg:flex-row gap-4 lg:gap-6">
            <div data-aos="zoom-out-up" data-aos-delay="0" class="w-full lg:flex-1 flex gap-8 flex-wrap">
                <svg class="w-12 h-12 mt-2 text-x-prime pointer-events-none" fill="currentColor" viewBox="0 -960 960 960">
                    <path
                        d="M480.124-517Q516-517 542-542.708t26-62Q568-641 541.876-667t-62-26Q444-693 418-667.084t-26 62.5Q392-568 418.124-542.5t62 25.5ZM435-181v-118q-56-12-98.5-48.5T275-435q-91 2-155.5-59.63Q55-556.259 55-648v-44q0-38.213 26.894-65.106Q108.787-784 147-784h105v-28q0-22.75 18.212-40.875Q288.425-871 312-871h337q22.575 0 41.287 18.125Q709-834.75 709-812v28h105q36.75 0 63.875 26.894Q905-730.213 905-692v44q0 91.741-64.5 153.37Q776-433 685-435q-19 51-61.5 87.5T526-299v118h92q20.2 0 33.1 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q638.2-90 617.633-90H342.367q-20.142 0-32.755-12.86Q297-115.719 297-135.36 297-155 309.612-168q12.613-13 32.388-13h93ZM252-526v-166H147v44q0 46 30 79.5t75 42.5Zm228.235 142q55.265 0 96.015-41.208Q617-466.417 617-522v-257H343v257q0 55.583 40.985 96.792Q424.971-384 480.235-384ZM709-526q44-9 74.5-42.5T814-648v-44H709v166Zm-229-56Z" />
                </svg>
                <div
                    class="flex-1 flex flex-col ps-2 relative before:content-[''] before:absolute before:top-3 before:-left-4 rtl:before:left-auto rtl:before:-right-4 before:rounded-full before:w-[4px] before:h-12 before:bg-x-black after:content-[''] after:absolute after:top-3 after:-left-4 rtl:after:left-auto rtl:after:-right-4 after:rounded-full after:h-[4px] after:w-6 after:bg-x-black">
                    <h3 class="font-x-core text-lg text-x-prime ms-4">
                        {{ __('Experience') }}
                    </h3>
                    <p class="font-medium text-base text-x-black text-justify">
                        {{ __('With our experience offering rejuvenation services across Italy, Morocco, and all Africa.') }}
                    </p>
                </div>
            </div>
            <div data-aos="zoom-out-up" data-aos-delay="200" class="w-full lg:flex-1 flex gap-8 flex-wrap">
                <svg class="w-12 h-12 mt-2 text-x-prime pointer-events-none" fill="currentColor" viewBox="0 -960 960 960">
                    <path
                        d="M265-230 84-410q-14-14-14-33t14-33q13-12 32-12t33 12l148 149 65 65-31 32q-15 14-34.5 13.5T265-230Zm164-24L248-435q-14-14-13-33t15-34q12-11 31.5-11t32.5 11l148 150 351-349q11-13 30-13.5t34 12.5q13 13 13.5 32.5T877-636L495-254q-13 13-33 13t-33-13Zm35-156-63-65 228-228q13-13 32-13t33 13q12 14 12 33t-12 31L464-410Z" />
                </svg>
                <div
                    class="flex-1 flex flex-col ps-2 relative before:content-[''] before:absolute before:top-3 before:-left-4 rtl:before:left-auto rtl:before:-right-4 before:rounded-full before:w-[4px] before:h-12 before:bg-x-black after:content-[''] after:absolute after:top-3 after:-left-4 rtl:after:left-auto rtl:after:-right-4 after:rounded-full after:h-[4px] after:w-6 after:bg-x-black">
                    <h3 class="font-x-core text-lg text-x-prime ms-4">
                        {{ __('Quality') }}
                    </h3>
                    <p class="font-medium text-base text-x-black text-justify">
                        {{ __('100% satisfaction guaranteed! Experience our services with no fuss, no gimmicks, just outstanding results.') }}
                    </p>
                </div>
            </div>
            <div data-aos="zoom-out-up" data-aos-delay="400" class="w-full lg:flex-1 flex gap-8 flex-wrap">
                <svg class="w-12 h-12 mt-2 text-x-prime pointer-events-none" fill="currentColor" viewBox="0 -960 960 960">
                    <path
                        d="m437-439-69-73q-10.25-12-25.125-11.5T317-514q-12 12.511-12 27.256Q305-472 317-461l88 86q12.364 15 32.182 15T470-375l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17.125T100-245l14-115.704L38-451q-10-12.39-10-29.195T38-510l76-88.297L100-714q-3-17.75 7.5-31.875T137-764l119.31-24.197L316-892q8.88-14.562 25.92-20.281Q358.96-918 376-911l104 49 105-49q16-5 33.056-.818Q635.111-907.636 644-893l60.69 104.803L823-764q19 4 29.5 18.125T860-714l-14 115.703L922-510q10 13.39 10 30.195T922-451l-76 90.296L860-245q3 17.75-7.5 31.875T823-196l-118 25-61 104q-8.889 14.636-25.944 18.818Q601-44 585-49L480-98 376-49q-17 5-34.056.318Q324.889-53.364 316-68Zm60.736-83 103.121-43.564L586-151l65-96 112-29-11-116.191 77-87.894L752-570l11-116-112-27-66.659-96-104.159 43.458L374-809l-64.718 96.241L198-686.448 208-570l-77 90 77 88-10 118.462 111.099 26.307L376.736-151ZM480-480Z" />
                </svg>
                <div
                    class="flex-1 flex flex-col ps-2 relative before:content-[''] before:absolute before:top-3 before:-left-4 rtl:before:left-auto rtl:before:-right-4 before:rounded-full before:w-[4px] before:h-12 before:bg-x-black after:content-[''] after:absolute after:top-3 after:-left-4 rtl:after:left-auto rtl:after:-right-4 after:rounded-full after:h-[4px] after:w-6 after:bg-x-black">
                    <h3 class="font-x-core text-lg text-x-prime ms-4">
                        {{ __('Guarantee') }}
                    </h3>
                    <p class="font-medium text-base text-x-black text-justify">
                        {{ __('We guarantee that we only use high-quality products, delivering excellent results - first time, every time.') }}
                    </p>
                </div>
            </div>
        </section>

        <section class="w-full flex flex-col lg:flex-row gap-8 lg:gap-6">
            <div class="w-full lg:flex-[1] flex flex-col gap-4 lg:my-4">
                <h2 data-aos="fade-{{ Core::lang('ar') ? 'left' : 'right' }}" data-aos-delay="100"
                    class="uppercase font-x-core text-x-black text-4xl sm:text-5xl lg:text-[3.19rem] leading-[1] mb-6">
                    {{ __('shipping') }}
                </h2>
                <p data-aos="fade-{{ Core::lang('ar') ? 'left' : 'right' }}" data-aos-delay="300"
                    class="text-base font-medium text-x-black text-justify">
                    {{ __('We take pride in our commitment to providing exceptional service to our customers. To ensure a seamless experience, we\'ve partnered with a specialized global delivery network that caters to your every need.') }}
                </p>
                <p data-aos="fade-{{ Core::lang('ar') ? 'left' : 'right' }}" data-aos-delay="500"
                    class="text-base font-medium text-x-black text-justify">
                    {{ __('Whether you\'re across town or around the world, our trusted delivery partner ensures that your chosen products are delivered to your doorstep promptly and securely.') }}
                </p>
                <div class="w-max gap-4 lg:gap-6 flex mt-6">
                    <div data-aos="fade-up" data-aos-delay="700" class="w-max flex flex-col gap-2 items-center">
                        <svg class="w-12 h-12 text-x-prime pointer-events-none" fill="currentColor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M620.132-154q-138.038 0-232.585-95.1T293-480.057Q293-616 387.421-711.5T619.89-807q134.201 0 229.655 95.512Q945-615.975 945-480.247q0 136.153-95.338 231.2T620.132-154Zm-.485-84q100.912 0 171.132-70.471Q861-378.941 861-480t-70.265-172.029Q720.471-723 619.706-723t-171.735 70.659Q377-581.681 377-480.353q0 100.912 70.659 171.632Q518.319-238 619.647-238ZM662-498.612 661-596q0-17.6-11.963-30.3Q637.075-639 619.5-639q-18.275 0-29.888 12.825Q578-613.35 578-596v114q0 7.565 3 16.783Q584-456 591-451l88 88q11.4 13 28.095 13 16.694 0 29.8-12.947Q750-375.895 750-392.614T737-422l-75-76.612ZM97.773-599q-19.523 0-31.148-12.446Q55-623.891 55-640.246 55-656.6 66.625-669.8T97.773-683H212q16.25 0 28.625 12.94T253-640.035q0 16.66-12.375 28.847Q228.25-599 212-599H97.773ZM57.631-439q-19.381 0-31.006-12.446Q15-463.891 15-480.246 15-496.6 26.625-509.8T57.631-523h154.49q16.529 0 28.704 12.94T253-480.035q0 16.66-12.375 28.847Q228.25-439 212.143-439H57.631Zm40.142 160q-19.523 0-31.148-12.446Q55-303.891 55-320.246 55-336.6 66.625-349.8T97.773-363H212q16.25 0 28.625 12.94T253-320.035q0 16.66-12.375 28.847Q228.25-279 212-279H97.773ZM620-480Z" />
                        </svg>
                        <h5 class="text-x-black font-x-core text-base text-center">
                            {{ __('Fast Delivery') }}
                        </h5>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="900" class="w-max flex flex-col gap-2 items-center">
                        <svg class="w-12 h-12 text-x-prime pointer-events-none" fill="currentColor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M479.945-59q-87.053 0-164.146-32.604-77.094-32.603-134.343-89.852-57.249-57.249-89.852-134.41Q59-393.028 59-480.362q0-87.228 32.662-163.934 32.663-76.706 90.042-134.279 57.378-57.574 134.252-90.499Q392.829-902 479.836-902q87.369 0 164.498 32.848 77.129 32.849 134.41 90.303 57.281 57.454 90.269 134.523Q902-567.257 902-479.724q0 87.468-32.926 164.044-32.925 76.575-90.499 133.781-57.573 57.205-134.447 90.052Q567.255-59 479.945-59Zm.055-91q125.375 0 216.688-81.5Q788-313 805-433q0 1.818.5 3.659.5 1.841.5 1.341-12 16-28.892 24T739-396h-73q-37.188 0-62.594-25.504T578-484.333V-528H402v-79.584q0-37.254 25.504-62.835Q453.008-696 489.333-696h45.513v-22q0-20.155 15.077-47.578Q565-793 585-794q-23.992-6.818-49.875-11.409Q509.243-810 480.36-810q-136.873 0-233.616 96.556Q150-616.888 150-480q0 3 .5 5.5t.5 6.5h111q73.05 0 124.025 50.975Q437-366.05 437-293.943V-250H306v57q39 19 82.45 31T480-150Z" />
                        </svg>
                        <h5 class="text-x-black font-x-core text-base text-center">
                            {{ __('Wide Coverage') }}
                        </h5>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="1100" class="w-max flex flex-col gap-2 items-center">
                        <svg class="w-12 h-12 text-x-prime pointer-events-none" fill="currentColor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M480.159-493q-72.621 0-122.39-50.269Q308-593.537 308-666t49.609-121.731Q407.219-837 479.841-837t122.89 49.156Q653-738.688 653-665.5q0 71.963-50.109 122.231Q552.781-493 480.159-493ZM138-221v-24.987q0-41.078 22.172-74.962T220-372q62.201-27.903 127.779-44.952Q413.356-434 479.994-434q67.006 0 131.784 17.048Q676.556-399.903 739-372q37.906 15.245 60.953 50.3Q823-286.645 823-245.848V-221q0 38.15-26.894 64.575Q769.213-130 731-130H229q-37.8 0-64.4-26.425Q138-182.85 138-221Zm342-363q33 0 57-24t24-57q0-33-23.796-57.5-23.797-24.5-57-24.5Q447-747 423-722.319T399-665.5q0 33.5 24 57.5t57 24Zm166 272v91h85v-21.512q0-15.419-9-28.954Q713-285 698-293q-12-7-25-11t-27-8Zm-252-23.322V-281h176v-53q-24-5.143-46-6.571Q502-342 480-342t-43 1.525q-21 1.525-43 5.153ZM229-221h88v-96q-13.587 6.111-28.405 11.46Q273.778-300.19 262-293q-16 8-24.5 21.534-8.5 13.535-8.5 28.954V-221Zm417 0H317h329ZM480-665Z" />
                        </svg>
                        <h5 class="text-x-black font-x-core text-base text-center">
                            {!! __('150+ Couriers') !!}
                        </h5>
                    </div>
                </div>
            </div>
            <div data-aos="fade-{{ Core::lang('ar') ? 'right' : 'left' }}"
                class="w-full lg:flex-[1] relative order-[-1] lg:order-[1]">
                <div class="w-4 rtl:order-[1]"></div>
                <div style="background-image: url({{ asset('img/shipping.jpg') }})"
                    class="w-full h-full aspect-[12/9] lg:w-[calc(100%-1rem)] lg:aspect-auto lg:ms-4 rounded-x-core bg-x-white overflow-hidden bg-no-repeat bg-cover bg-center border border-x-black-blur">
                </div>
                <div style="background: radial-gradient(var(--acent), var(--prime))"
                    class="w-40 lg:w-8 rounded-x-core shadow-x-core h-8 lg:h-40 absolute -bottom-4 lg:bottom-10 right-4 rtl:right-auto rtl:left-4 lg:right-auto lg:left-0 rtl:lg:left-auto rtl:lg:right-0">
                </div>
            </div>
        </section>

        <section data-aos="zoom-down" class="w-full flex flex-col lg:p-6 lg:flex-row lg:gap-6 relative">
            <div
                class="aspect-[12/9] lg:aspect-auto lg:absolute lg:inset-0 bg-x-white rounded-x-core overflow-hidden flex justify-center items-center border border-x-black-blur">
                <iframe class="w-[200%] h-[200%] lg:absolute lg:ms-[50%]"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3478.45375954224!2d47.9513965!3d29.3276948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf9b216abd6ac9%3A0x511d2a83565207b7!2sThe%20Cut%20Studio!5e0!3m2!1sen!2sma!4v1695572558474!5m2!1sen!2sma"
                    loading="lazy"></iframe>
            </div>
            <div data-aos="fade-up" data-aos-delay="500"
                class="w-11/12 mx-auto -mt-8 lg:mt-0 lg:flex-[1] p-4 lg:p-6 flex flex-col gap-4 bg-x-white shadow-md rounded-x-core z-[1]">
                <h2 class="uppercase font-x-core text-x-black text-4xl sm:text-5xl lg:text-[3.19rem] leading-[1] mb-6">
                    {{ __('contact us') }}
                </h2>
                <form action="{{ route('actions.guest.contact') }}" method="POST" class="w-full flex flex-col gap-4">
                    @csrf
                    <div class="flex flex-col gap-px lg:flex-1">
                        <label for="name" class="text-x-black font-x-core text-sm">{{ __('Full Name') }}</label>
                        <input id="name" type="text" name="name" placeholder="{{ __('Full Name') }}"
                            value="{{ old('name') }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime w-full p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <div class="flex flex-col gap-px lg:flex-1">
                        <label for="email" class="text-x-black font-x-core text-sm">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" placeholder="{{ __('Email') }}"
                            value="{{ old('email') }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime w-full p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <div class="flex flex-col gap-px lg:flex-1">
                        <label for="phone" class="text-x-black font-x-core text-sm">{{ __('Phone') }}</label>
                        <input id="phone" type="tel" name="phone" placeholder="{{ __('Phone') }}"
                            value="{{ old('phone') }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime w-full p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <div class="flex flex-col gap-px">
                        <label for="message" class="text-x-black font-x-core text-sm">{{ __('Message') }}</label>
                        <textarea id="message" name="message" placeholder="{{ __('Message') }}" rows="3"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime w-full p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2">{{ old('description') }}</textarea>
                    </div>
                    <button
                        class="w-full rounded-md px-4 py-2 text-lg lg:text-xl font-x-core text-white bg-x-prime hover:text-x-black focus:text-x-black hover:bg-x-acent focus:bg-x-acent outline-none">
                        {{ ucwords(__('Send')) }}
                    </button>
                </form>
            </div>
            <div class="hidden lg:flex-[1] lg:block pointer-events-none"></div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 0,
        });
        Slider({
            wrap: "#slide",
        }, {
            flip: {{ Core::lang('ar') ? 'true' : 'false' }},
            auto: true,
            time: 5000,
            touch: true,
            infinite: true,
        }).resize(($) => {
            $.update({});
        }, ($) => {
            $.update({});
        });

        @if ($products->count())
            const products = document.querySelector("#products").parentElement;
            Slider({
                wrap: "#products",
            }, {
                flip: {{ Core::lang('ar') ? 'true' : 'false' }},
                time: 5000,
            }).resize(($) => {
                const size = products.clientWidth / 4;
                $.update({
                    {{ $products->count() < 4 ? 'infinite: false, touch: false, auto: false, cols: ' . $products->count() . ', size: size,' : 'infinite: true, touch: true, auto: true, cols: 4, size: false,' }}
                })
            }, ($) => {
                const size = products.clientWidth / 2;
                $.update({
                    {{ $products->count() < 2 ? 'infinite: false, touch: false, auto: false, cols: ' . $products->count() . ', size: size,' : 'infinite: true, touch: true, auto: true, cols: 2, size: false,' }}
                })
            });
        @endif
    </script>
@endsection
