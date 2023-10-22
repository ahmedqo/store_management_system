@extends('shared.admin.base')
@section('title', __('Request Summary') . ' #' . $data->id)

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Request Summary') }} #{{ $data->id }}</h1>
            <div
                class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                <div class="container mx-auto lg:w-max p-4 lg:p-0">
                    <div
                        class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                        <a href="{{ route('views.quotations.store', ['target' => $data->id]) }}"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-slate-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-slate-300 focus-within:!text-x-black focus-within:bg-slate-300">
                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M278-150v-440q0-38.063 27-65.532Q332-683 369-683h441q37.75 0 64.875 27.125T902-591v287q0 19.444-7.5 36.222Q887-251 874-238L722-86q-13 13-29.778 20T657-59H369q-37.75 0-64.375-26.625T278-150ZM60-717q-7-37 15-68.5t59-37.5l435-77q37-6 68.5 15.5T675-826l14 83H370q-62 0-107 44.75T218-591v383q-30-2-53-22t-28-53L60-717Zm484 392v77q0 20.75 13.175 33.375 13.176 12.625 33 12.625Q610-202 622.5-214.625 635-227.25 635-248v-77h78q19.75 0 32.375-12.675Q758-350.351 758-371.175 758-390 745.375-403T713-416h-78v-78q0-18.75-12.675-31.875Q609.649-539 589.825-539 570-539 557-525.875 544-512.75 544-494v78h-77q-19.75 0-32.875 13.175-13.125 13.176-13.125 32Q421-350 434.125-337.5 447.25-325 467-325h77Z" />
                            </svg>
                            <span class="hidden lg:block">{{ __('Quote') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="toremove bg-x-white rounded-x-core shadow-x-core p-4">
            <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="flex flex-col gap-px">
                    <label class="text-x-black font-x-core text-sm">{{ __('Name') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ ucwords($data->name) }}
                    </div>
                </div>
                <div class="flex flex-col gap-px">
                    <label class="text-x-black font-x-core text-sm">{{ __('Created at') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ $data->created_at->diffForHumans() }}</div>
                </div>
                <div class="flex flex-col gap-px">
                    <label class="text-x-black font-x-core text-sm">{{ __('Email') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ $data->email }}
                    </div>
                </div>
                <div class="flex flex-col gap-px">
                    <label class="text-x-black font-x-core text-sm">{{ __('Phone') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ $data->phone }}
                    </div>
                </div>
                <div class="w-full lg:col-span-2">
                    <table default x-table search>
                        <thead>
                            <tr>
                                <td>{{ __('Product') }}</td>
                                <td>{{ __('Quantity') }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->Items as $item)
                                <tr>
                                    <td>{{ $item->Product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($data->message)
                    <div class="flex flex-col gap-px lg:col-span-2">
                        <label class="text-x-black font-x-core text-sm">{{ __('Note') }}</label>
                        <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                            {{ $data->message }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        x.DataTable();
    </script>
@endsection
