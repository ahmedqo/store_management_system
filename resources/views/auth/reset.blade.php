@extends('shared.auth.base')
@section('title', __('Reset Password'))

@section('content')
    <form action="{{ route('actions.reset.index', $token) }}" method="POST" class="w-full gap-4 flex flex-col">
        @csrf
        <div class="flex flex-col gap-px">
            <label for="new_password" class="text-x-black font-x-core text-sm">{{ __('New Password') }}</label>
            <input x-password id="new_password" type="password" name="new_password" placeholder="{{ __('New Password') }}" />
        </div>
        <div class="flex flex-col gap-px">
            <label for="confirm_password" class="text-x-black font-x-core text-sm">{{ __('Confirm Password') }}</label>
            <input x-password id="confirm_password" type="password" name="confirm_password"
                placeholder="{{ __('Confirm Password') }}" />
        </div>
        <button
            class="w-full lg:w-max flex gap-2 items-center justify-center font-x-core text-sm rounded-md bg-x-prime text-x-white relative h-[42px] px-4 outline-none hover:!text-x-black hover:bg-x-acent focus-within:!text-x-black focus-within:bg-x-acent ms-auto">
            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M520-95q-66 0-126.5-19.5T287-172q-16-12-20-33t13-37q13-14 32-14t34 11q39 30 82.5 44.5T520-186q122 0 208.5-86.5T815-480q0-121-87-208t-208-87q-119 0-207 86.5T226-481v15l47-48q9-10 23.5-10t25.5 10q8 9 8.5 24t-8.5 24L213-357q-7 5-15.5 9t-17.5 4q-10 0-18.5-4t-14.5-9L40-466q-9-9-10.5-24t9.5-24q10-9 24-8.5t24 8.5l48 47v-15q-1-77 28.5-147.5t82-122.5q52.5-52 123-83.5T520-867q80 0 151 31t123.5 82.5Q847-702 877-631t30 151q0 162-112.5 273.5T520-95Zm-80-231q-13 0-23.5-10.5T406-360v-120q0-15 11.5-24.5T446-515v-45q0-31 21.5-53t52.5-22q31 0 53 22t22 53v45q16 1 28 10.5t12 24.5v120q0 13-11 23.5T600-326H440Zm35-189h91v-45q0-20-13-33t-33-13q-20 0-32.5 13T475-560v45Z" />
            </svg>
            <span>{{ __('Reset') }}</span>
        </button>
    </form>
@endsection
