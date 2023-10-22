@extends('shared.admin.base')
@section('title', __('Quotation Summary') . ' #' . $data->id)

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Quotation Summary') }} #{{ $data->id }}</h1>
            <div
                class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                <div class="container mx-auto lg:w-max p-4 lg:p-0">
                    <div
                        class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                        <button id="print"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-emerald-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-emerald-300 focus-within:!text-x-black focus-within:bg-emerald-300 bg-e">
                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M890-355H70q-18.35 0-31.675-13.375Q25-381.751 25-400.175 25-418.6 38.325-432.3T70-446h820q18.35 0 32.175 13.875Q936-418.249 936-399.825q0 18.425-13.825 31.625T890-355ZM731-628 545-810v136q0 20.75 12.625 33.375T591-628h140ZM229-59q-36.75 0-63.875-26.425T138-150v-145h685v145q0 38.15-27.625 64.575Q767.75-59 731-59H229Zm-91-447v-304q0-38.15 27.125-65.075Q192.25-902 229-902h326q18.244 0 35.622 7.5T620-874l174 174q13.087 12.643 21.043 29.813Q823-653.016 823-635v129H138Z" />
                            </svg>
                            <span class="hidden lg:block">{{ __('Print') }}</span>
                        </button>
                        <a href="{{ route('views.quotations.patch', $data->id) }}"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-amber-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-amber-300 focus-within:!text-x-black focus-within:bg-amber-300">
                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M170-103q-32 7-53-14.5T103-170l39-188 216 216-188 39Zm235-78L181-405l435-435q27-27 64.5-27t63.5 27l96 96q27 26 27 63.5T840-616L405-181Z" />
                            </svg>
                            <span class="hidden lg:block">{{ __('Edit') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="toremove bg-x-white rounded-x-core shadow-x-core p-4">
            <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label class="text-x-black font-x-core text-sm">{{ __('Created at') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ $data->created_at->diffForHumans() }}</div>
                </div>
                <div class="flex flex-col gap-px">
                    <label class="text-x-black font-x-core text-sm">{{ __('Reference') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ strtoupper($data->reference) }}
                    </div>
                </div>
                <div class="flex flex-col gap-px">
                    <label class="text-x-black font-x-core text-sm">{{ __('Name') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ ucwords($data->name) }}
                    </div>
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
                                <td>{{ __('SL') }}</td>
                                <td>{{ __('Description') }}</td>
                                <td class="w-[80px] text-center">{{ __('Unit') }}</td>
                                <td class="w-[80px] text-center">{{ __('Quantity') }}</td>
                                <td class="w-[80px] text-center">{{ ucwords(__('Unit price')) }} ({{ $data->currency }})
                                </td>
                                <td class="w-[80px] text-center">{{ ucwords(__('Lot price')) }} ({{ $data->currency }})
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->Items as $item)
                                <tr>
                                    <td>
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td>{{ $item->Product->details }}</td>
                                    <td class="text-center w-[80px]">{{ $item->unit }}</td>
                                    <td class="text-center w-[80px]">{{ $item->quantity }}</td>
                                    <td class="text-center w-[80px]">{{ number_format($item->price) }}</td>
                                    <td class="text-center w-[80px] font-x-core">
                                        {{ number_format($item->price * $item->quantity) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-sm font-x-core text-center">
                                    {{ ucwords(__('Lot price')) }} ({{ $data->currency }})
                                </td>
                                <td class="font-x-core text-center">
                                    {{ number_format($data->Total() - $data->charge) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-sm font-x-core text-center">
                                    {{ __('Charges') }} ({{ $data->currency }})
                                </td>
                                <td class="font-x-core text-center">
                                    {{ number_format($data->charge) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-sm font-x-core text-center">
                                    {{ ucwords(__('Total amount')) }} ({{ $data->currency }})
                                </td>
                                <td class="font-x-core text-center">
                                    {{ number_format($data->Total()) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($data->note)
                    <div class="flex flex-col gap-px lg:col-span-2">
                        <label class="text-x-black font-x-core text-sm">{{ __('Note') }}</label>
                        <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                            {{ $data->note }}
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
