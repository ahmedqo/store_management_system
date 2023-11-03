@extends('shared.guest.base')
@section('title', __('Categories'))

@section('header')
    <div class="w-full p-4 container mx-auto">
        <div style="background: radial-gradient(var(--acent), var(--prime))" class="w-full rounded-x-core overflow-hidden">
            <div style="text-shadow: 0px 3px 12px #1d1d1d50, #1d1d1d25 0px 25px 20px; background-image: url({{ asset('img/bg-2.webp') }})"
                class="w-full min-h-[8rem] aspect-[4/1] flex items-center justify-center text-x-white font-x-core text-2xl lg:text-6xl p-4 bg-cover bg-no-repeat relative z-[0] bg-center">
                {{ __('Categories') }}
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="w-full flex flex-col lg:flex-row lg:flex-wrap gap-4 lg:gap-6 p-4">
        @include('shared.guest.list', [
            'items' => $row,
        ])
        <div class="w-full grid grid-rows-1 grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
            @forelse($data as $row)
                <div class="w-full flex flex-col gap-2">
                    <a href="{{ route('views.guest.products', [
                        'category' => $row->slug,
                    ]) }}"
                        class="relative group overflow-hidden aspect-[12/9] rounded-x-core bg-x-black-blur flex items-center justify-center border border-x-black-blur">
                        <img src="{{ Core::files(Core::CATEGORY)->get($row->file) }}" alt="{{ $row->slug }}_image"
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
            @empty
                <h6 class="text-x-black p-4 text-xl font-x-core uppercase text-center col-span-2 lg:col-span-5">
                    {{ __('No data found') }}
                </h6>
            @endforelse
        </div>
    </section>
@endsection
