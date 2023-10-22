@extends('shared.guest.base')
@section('title', __('Cart'))

@section('header')
    <div style="text-shadow: 0 0 2px var(--black)"
        class="w-full min-h-[8rem] aspect-[10/2] flex items-center justify-center text-x-white font-x-core text-2xl lg:text-6xl p-4 bg-cover bg-no-repeat relative z-[0] bg-center before:content-[''] before:inset-0 before:bg-x-black-blur before:absolute before:z-[-1] before:backdrop-blur-sm">
        {{ __('Cart') }}
    </div>
@endsection

@section('content')
    <section class="w-full p-4">
        <form action="{{ route('actions.requests.store') }}" method="POST"
            class="w-full flex flex-col gap-4 lg:flex-row lg:flex-wrap items-start">
            @csrf
            <div id="cartrows"
                class="w-full lg:flex-1 flex flex-col gap-4 p-4 rounded-x-core border-4 border-dashed border-x-black-blur">
            </div>
            <div class="w-full lg:w-5/12 flex flex-col gap-4 lg:sticky lg:top-4">
                <div class="flex flex-col gap-px lg:flex-1">
                    <label for="name" class="text-x-black font-x-core text-sm">{{ __('Full Name') }}</label>
                    <input id="name" type="text" name="name" placeholder="{{ __('Full Name') }}"
                        value="{{ old('name') }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="flex flex-col gap-px lg:flex-1">
                        <label for="email" class="text-x-black font-x-core text-sm">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" placeholder="{{ __('Email') }}"
                            value="{{ old('email') }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <div class="flex flex-col gap-px lg:flex-1">
                        <label for="phone" class="text-x-black font-x-core text-sm">{{ __('Phone') }}</label>
                        <input id="phone" type="tel" name="phone" placeholder="{{ __('Phone') }}"
                            value="{{ old('phone') }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                </div>
                <div class="flex flex-col gap-px">
                    <label for="message" class="text-x-black font-x-core text-sm">{{ __('Message') }}</label>
                    <textarea id="message" name="message" placeholder="{{ __('Message') }}" rows="3"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-lg focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2">{{ old('description') }}</textarea>
                </div>
                <button id="addtocart"
                    class="w-full rounded-x-core px-4 py-2 text-lg lg:text-xl font-x-core text-white bg-x-prime hover:text-x-black focus:text-x-black hover:bg-x-acent focus:bg-x-acent outline-none">
                    {{ __(ucwords('Request quotation')) }}
                </button>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script>
        const target = document.querySelector("#cartrows");
        if (!JSON.parse(localStorage["{{ env('APP_CART') }}"]).length) {
            target.classList.remove("p-4", "rounded-x-core", "border-4", "border-dashed", "border-x-black-blur");
            target.nextElementSibling.remove();
            target.innerHTML = `
                <h5 class="text-x-black p-4 my-10 text-xl font-x-core uppercase text-center">
                    {{ __('No data found') }}
                </h5>
            `;
        } else {
            CreateRows("{{ env('APP_CART') }}", "#cartrows");
        }
        RemoveRows("{{ env('APP_CART') }}");
        Counter(".counter");
    </script>
@endsection
