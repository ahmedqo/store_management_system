@extends('shared.guest.base')
@section('title', ucwords($data->name))

@section('header')
    <div class="w-full p-4 container mx-auto">
        <div style="background: radial-gradient(var(--acent), var(--prime))"
            class="w-full rounded-x-core overflow-hidden border border-x-black-blur">
            <div style="text-shadow: 0px 3px 12px #1d1d1d50, #1d1d1d25 0px 25px 20px"
                class="w-full min-h-[8rem] aspect-[10/2] flex items-center justify-center text-x-white font-x-core text-2xl lg:text-6xl p-4 bg-cover bg-no-repeat relative z-[0] bg-center before:content-[''] before:inset-0 before:bg-x-black-blur before:absolute before:z-[-1] before:backdrop-blur-sm">
                {{ ucwords(__('Product details')) }}
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="w-full flex flex-col lg:flex-row lg:flex-wrap gap-4 lg:gap-6 p-4">
        @include('shared.guest.list', [
            'items' => $row,
        ])
        <div class="w-full lg:w-7/12">
            <div class="w-full flex flex-col gap-4 sticky top-4">
                <div class="w-full relative">
                    <div id="slide" class="w-full aspect-video rounded-x-core bg-x-white shadow-x-core">
                        <ul class="w-full h-full">
                            @foreach ($data->Files as $file)
                                <li class="w-full h-full flex items-center justify-center">
                                    <img src="{{ Core::files(Core::PRODUCT)->get($file->name) }}"
                                        alt="{{ $data->slug }}_image_{{ $loop->index + 1 }}"
                                        class="block w-full h-full object-contain" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div dir="ltr"
                        class="flex w-full p-2 justify-between items-center absolute top-1/2 -translate-y-1/2 left-0 right-0 pointer-events-none">
                        <button id="prev"
                            class="shadow-md pointer-events-auto flex rounded-full w-8 h-8 items-center justify-center bg-x-prime text-gray-50 hover:text-x-black focus:text-x-black hover:bg-x-acent focus:bg-x-acent outline-none">
                            <svg class="pointer-events-none w-6 h-6" fill="currentColor" viewBox="0 96 960 960">
                                <path
                                    d="M528 805 331 607q-7-6-10.5-14t-3.5-18q0-9 3.5-17.5T331 543l198-199q13-12 32-12t33 12q13 13 12.5 33T593 410L428 575l166 166q13 13 13 32t-13 32q-14 13-33.5 13T528 805Z" />
                            </svg>
                        </button>
                        <button id="next"
                            class="shadow-md pointer-events-auto flex rounded-full w-8 h-8 items-center justify-center bg-x-prime text-gray-50 hover:text-x-black focus:text-x-black hover:bg-x-acent focus:bg-x-acent outline-none">
                            <svg class="pointer-events-none w-6 h-6" fill="currentColor" viewBox="0 96 960 960">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:flex-[1] flex flex-col gap-5 lg:gap-6">
            <div class="flex flex-col">
                <h1 class="font-x-core text-x-black text-2xl lg:text-4xl">{{ ucwords($data->name) }}</h1>
                @if ($data->reference)
                    <h3 class="font-x-core text-gray-500 text-md lg:text-lg">{{ __('Ref') }}:
                        {{ strtoupper($data->reference) }}
                    </h3>
                @endif
            </div>
            <div class="flex flex-col gap-3">
                <p class="text-base text-gray-800">
                    {{ $data->details }}
                </p>
                <div class="w-max flex flex-col gap-2">
                    <h6 class="text-sm font-x-core text-x-black">{{ __('Brand') }}:</h6>
                    <div class="flex gap-2 items-center">
                        <a href="#">
                            <img src="{{ Core::files(Core::BRAND)->get($data->Brand->file) }}"
                                class="block max-h-[3rem] max-w-[6rem] object-contain"
                                alt="{{ $data->Brand->name }}_image">
                        </a>
                        {{-- <h3 class="text-md font-x-core text-x-black">{{ ucwords($data->Brand->name) }}</h3> --}}
                    </div>
                </div>
            </div>
            <form class="w-full flex flex-col mt-auto gap-5 lg:gap-6">
                <div id="counter" class="flex flex-wrap w-max gap-1 items-center">
                    <button counter="-"
                        class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-x-prime text-x-prime text-lg font-black outline-none hover:border-x-acent hover:text-x-acent focus:border-x-acent focus:text-x-acent">
                        <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M225-434q-20.75 0-33.375-13.36Q179-460.719 179-479.86q0-20.14 12.625-32.64T225-525h511q19.775 0 32.888 12.675Q782-499.649 782-479.509q0 19.141-13.112 32.325Q755.775-434 736-434H225Z" />
                        </svg>
                    </button>
                    <input counter="x" type="number" name="qte" value="1"
                        class="w-20 text-center bg-transparent text-x-black font-black p-1 text-md rounded-md focus-within:outline-x-prime focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    <button counter="+"
                        class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-x-prime text-x-prime text-lg font-black outline-none hover:border-x-acent hover:text-x-acent focus:border-x-acent focus:text-x-acent">
                        <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                        </svg>
                    </button>
                </div>
                <button id="addtocart"
                    class="w-full rounded-x-core px-4 py-2 text-lg lg:text-xl font-x-core text-white bg-x-prime hover:text-x-black focus:text-x-black hover:bg-x-acent focus:bg-x-acent outline-none">
                    {{ ucwords(__('Request quotation')) }}
                </button>
            </form>
        </div>
        @if ($data->description)
            <div class="w-full flex flex-col gap-3">
                <h6 class="text-md font-x-core text-x-black">{{ __('Description') }}:</h6>
                <div class="x-revert">
                    {!! $data->description !!}
                </div>
            </div>
        @endif
    </section>
@endsection

@section('scripts')
    <script>
        Counter("#counter");
        Slider({
            wrap: "#slide",
            next: "#next",
            prev: "#prev",
        }, {
            flip: {{ Core::lang('ar') ? 'true' : 'false' }},
            auto: true,
            time: 5000,
            touch: true,
            infinite: true,
        });
        document.querySelector("#addtocart").addEventListener("click", e => {
            e.preventDefault();
            const rows = JSON.parse(localStorage.{{ env('APP_CART') }});
            const item = rows.find(e => e.id === {{ $data->id }});
            if (item) {
                item.qte += +document.querySelector('[name="qte"]').value
            } else {
                rows.push({
                    img: "{{ Core::files(Core::PRODUCT)->get($data->Files[0]->name) }}",
                    link: "{{ route('views.guest.product', $data->slug) }}",
                    qte: +document.querySelector('[name="qte"]').value,
                    title: "{{ ucwords($data->name) }}",
                    id: {{ $data->id }},
                });
            }
            localStorage.setItem("{{ env('APP_CART') }}", JSON.stringify(rows));
            x.Toaster("{{ __('Added successfully') }}", "success");
        });
    </script>
@endsection
