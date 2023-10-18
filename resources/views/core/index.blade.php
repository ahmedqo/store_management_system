@extends('shared.admin.base')
@section('title', __('Dashboard'))

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Schedule') }}</h1>
        </div>
        <div id="calendar" class="w-full"></div>
    </div>
@endsection
