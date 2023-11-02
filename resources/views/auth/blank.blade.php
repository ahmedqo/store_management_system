@extends('shared.auth.base')
@section('title', __('Forgot Password'))

@section('content')
    <form action="{{ route('actions.blank.index') }}" method="POST" class="w-full gap-4 flex flex-col">
        @csrf
        <p class="font-x-core text-sm text-x-black">
            {{ __('Did you forget your password? No problem. Just tell us your email address, and we will send you a link that will allow you to choose a new password.') }}
        </p>
        <div class="flex flex-col gap-px">
            <label for="email" class="text-x-black font-x-core text-sm">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" placeholder="{{ __('Email') }}"
                class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime w-full p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
        </div>
        <button
            class="w-full lg:w-max flex justify-center gap-2 items-center font-x-core text-sm rounded-md bg-x-prime text-x-white relative h-[42px] px-4 outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent ms-auto">
            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M382-396 100-505q-15-5-22-17.5T71-548q0-14 7-25t22-18l678-260q13-5 26-2t22 12q10 11 13.5 23.5T838-791L577-113q-6 16-17 22.5T535-84q-14 0-26.5-7T491-114L382-396Z" />
            </svg>
            <span>{{ __('Send') }}</span>
        </button>
    </form>
@endsection
