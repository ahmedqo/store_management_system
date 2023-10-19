@extends('shared.guest.base')
@section('title', __('Home'))

@section('header')
    <div style="text-shadow: 0 0 2px var(--black)"
        class="w-full min-h-[8rem] aspect-video lg:aspect-[12/4] flex items-center justify-center text-x-white font-x-core text-2xl lg:text-6xl p-4 bg-cover bg-no-repeat relative z-[0] bg-center before:content-[''] before:inset-0 before:bg-x-black-blur before:absolute before:z-[-1] before:backdrop-blur-sm">
        {{ __('Home') }}
    </div>
@endsection

@section('content')
    <div class="w-full flex flex-col gap-6 lg:gap-10 p-4 lg:my-6">
        @if ($products->count())
            <section class="w-full flex flex-col gap-4 lg:gap-6">
                <div class="w-full flex flex-col items-center">
                    <h3 class="text-md lg:text-lg text-x-prime font-x-core">{{ ucwords(__('Quick pick')) }}</h3>
                    <h3 class="text-2xl lg:text-4xl text-x-black font-x-core">{{ ucwords(__('Latest goods')) }}</h3>
                </div>
                <div class="w-[calc(100%+2rem)] -ms-4">
                    <div id="products" class="w-full">
                        <ul class="w-full h-full">
                            @foreach ($products as $row)
                                <li class="p-3">
                                    <div class="w-full flex flex-col gap-2">
                                        <a href="{{ route('views.guest.product', $row->slug) }}"
                                            class="relative group overflow-hidden aspect-[12/10] rounded-x-core shadow-x-core">
                                            <img src="{{ Core::files(Core::PRODUCT)->get($row->Files->first()->name) }}"
                                                alt="{{ $row->slug }}_image_1"
                                                class="block w-full h-full object-cover bg-x-white transition-transform group-hover:scale-150 group-focus:scale-150" />
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
                                        <h4 class="text-x-black text-base lg:text-lg font-x-core text-center">
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

        @if ($brands->count())
            <section class="w-full">
                {{-- <h4 class="text-x-black text-lg lg:text-xl font-x-core">
                    {{ ucwords(__('Brands')) }}
                </h4> --}}
                <div class="w-[calc(100%+2rem)] -ms-4">
                    <div id="brands" class="w-full">
                        <ul class="w-full h-full">
                            @foreach ($brands as $row)
                                <li class="p-3">
                                    <a href="{{ route('views.guest.products', [
                                        'brand' => $row->slug,
                                    ]) }}"
                                        class="relative overflow-hidden aspect-square rounded-full shadow-x-core bg-x-white p-4 flex items-center justify-center transition-transform hover:-translate-y-2 focus-within:-translate-y-2">
                                        <img src="{{ Core::files(Core::BRAND)->get($row->file) }}"
                                            alt="{{ $row->slug }}_image"
                                            class="block max-w-full max-h-full object-contain" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endif

        @if ($categories->count() > 2)
            {{-- <div
                class="
                    grid-cols-2 grid-rows-2
                    aspect-video lg:aspect-[32/9]  aspect-video lg:aspect-none lg:row-span-2  aspect-[32/9] col-span-2 lg:col-span-1

                    grid-cols-2 lg:grid-cols-5
                    aspect-video lg:aspect-square lg:col-span-2  aspect-video lg:aspect-[32/9] lg:col-span-3  aspect-video lg:aspect-[32/9] lg:col-span-3  aspect-video lg:aspect-square lg:col-span-2
                    
                    grid-cols-2 lg:grid-cols-3 lg:grid-row-2
                    aspect-video  aspect-video lg:aspect-none lg:row-span-2  col-span-2 lg:col-span-1 aspect-[32/9] lg:aspect-video  aspect-video  aspect-video
                ">
            </div> --}}
            <section class="w-full grid gap-4 lg:gap-6 {{ $class['parent'] }}">
                @foreach ($categories as $row)
                    <a href="{{ route('views.guest.products', [
                        'category' => $row->slug,
                    ]) }}"
                        class="relative w-full h-full group overflow-hidden rounded-x-core shadow-x-core bg-x-white flex items-center justify-center {{ $class['children'][$loop->index] }}">
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
    </div>
@endsection

@section('scripts')
    <script>
        @if ($brands->count())
            const brands = document.querySelector("#brands").parentElement;
            Slider({
                wrap: "#brands",
            }, {
                flip: {{ Core::lang('ar') ? 'true' : 'false' }},
                time: 5000,
            }).resize(($) => {
                const size = brands.clientWidth / 10;
                $.update({
                    {{ $brands->count() < 10 ? 'infinite: false, touch: false, auto: false, cols: ' . $brands->count() . ', size: size,' : 'infinite: true, touch: true, auto: true, cols: 10, size: false,' }}
                })
            }, ($) => {
                const size = brands.clientWidth / 4;
                $.update({
                    {{ $brands->count() < 4 ? 'infinite: false, touch: false, auto: false, cols: ' . $brands->count() . ', size: size,' : 'infinite: true, touch: true, auto: true, cols: 4, size: false,' }}
                })
            });
        @endif

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
