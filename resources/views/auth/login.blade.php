@extends('shared.auth.base')
@section('title', __('Login'))

@section('content')
    <form action="{{ route('actions.login.index') }}" method="POST" class="w-full gap-4 flex flex-col">
        @csrf
        <div class="flex flex-col gap-px">
            <label for="email" class="text-x-black font-x-core text-sm">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}"
                class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime w-full p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
        </div>
        <div class="flex flex-col gap-px">
            <label for="password" class="text-x-black font-x-core text-sm">{{ __('Password') }}</label>
            <input x-password id="password" type="password" name="password" placeholder="{{ __('Password') }}"
                value="{{ old('password') }}" />
        </div>
        <div class="flex gap-4 items-center flex-col-reverse lg:flex-row">
            <a href="{{ route('views.blank.index') }}"
                class="font-x-core text-sm text-x-black outline-none hover:text-x-prime focus-within:text-x-prime">
                {{ __('Forgot Password?') }}
            </a>
            <button type="submit"
                class="w-full lg:w-max flex gap-2 items-center justify-center font-x-core text-sm rounded-md bg-x-prime text-x-white relative h-[42px] px-4 outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent ms-auto">
                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                    <path
                        d="M360-306q-13-15-13.5-33.25T360-371l63-63H134q-19.775 0-32.387-13.36Q89-460.719 89-479.86q0-20.14 12.613-32.64Q114.225-525 134-525h287l-64-67q-14-12.133-13.5-30.014t14.714-31.933Q370.661-666 389.705-665.5 408.75-665 424-653l142 142q5 6.16 9 14.813 4 8.654 4 17.4 0 8.747-4 17.267T566-448L424-305q-14 12-32 11.5T360-306ZM528-97q-19.775 0-32.388-13.36Q483-123.719 483-142.86q0-20.14 12.612-32.64Q508.225-188 528-188h253v-584H528q-19.775 0-32.388-12.86Q483-797.719 483-817.86q0-19.14 12.612-32.64Q508.225-864 528-864h253q36 0 63.5 27.5T872-772v584q0 37-27.5 64T781-97H528Z" />
                </svg>
                <span>{{ __('Login') }}</span>
            </button>
        </div>
    </form>
@endsection
