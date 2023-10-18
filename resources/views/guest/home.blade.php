@extends('shared.guest.base')
@section('title', __('Home'))

@section('header')
    <div
        class="w-full min-h-[8rem] aspect-[12/4] flex items-center justify-center text-x-white font-x-core text-2xl lg:text-6xl p-4 bg-cover bg-no-repeat relative z-[0] bg-center before:content-[''] before:inset-0 before:bg-x-black-blur before:absolute before:z-[-1]">
        {{ __('Home') }}
    </div>
@endsection

@section('content')
    <div class="w-full flex flex-col gap-4 lg:gap-6 p-4 lg:my-2">
        @if ($brands->count())
            <section class="w-full">
                {{-- <h4 class="text-x-black text-lg lg:text-xl font-x-core">
                    {{ ucwords(__('Brands')) }}
                </h4> --}}
                <div class="w-[calc(100%+2rem)] -ms-4">
                    <div id="slide" class="w-full">
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
                            <h4 class="text-2xl lg:text-3xl font-x-core text-center">
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
            const slider = document.querySelector("#slide").parentElement;
            Slider({
                wrap: "#slide",
            }, {
                flip: {{ Core::lang('ar') ? 'true' : 'false' }},
                time: 5000,
            }).resize(($) => {
                const size = slider.clientWidth / 10;
                $.update({
                    {{ $brands->count() < 10 ? 'infinite: false, touch: false, auto: false, cols: ' . $brands->count() . ', size: size,' : 'infinite: true, touch: true, auto: true, cols: 10, size: false,' }}
                })
            }, ($) => {
                const size = slider.clientWidth / 4;
                $.update({
                    {{ $brands->count() < 4 ? 'infinite: false, touch: false, auto: false, cols: ' . $brands->count() . ', size: size,' : 'infinite: true, touch: true, auto: true, cols: 4, size: false,' }}
                })
            });
        @endif
    </script>
@endsection
