@extends('shared.admin.base')
@section('title', ucwords(__('Quotation Summary')) . ' #' . $data->id)

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ ucwords(__('Quotation Summary')) }} #{{ $data->id }}</h1>
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
                        @if ($data->request)
                            <a href="{{ route('views.requests.scene', $data->id) }}"
                                class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-slate-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-slate-300 focus-within:!text-x-black focus-within:bg-slate-300">
                                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M480.294-333Q550-333 598.5-381.794t48.5-118.5Q647-570 598.206-618.5t-118.5-48.5Q410-667 361.5-618.206t-48.5 118.5Q313-430 361.794-381.5t118.5 48.5Zm-.412-71q-39.465 0-67.674-28.326Q384-460.652 384-500.118q0-39.465 28.326-67.674Q440.652-596 480.118-596q39.465 0 67.674 28.326Q576-539.348 576-499.882q0 39.465-28.326 67.674Q519.348-404 479.882-404ZM480-180q-143.61 0-260.805-79T37.145-467.077q-3.945-5.987-6.045-14.901-2.1-8.915-2.1-17.824 0-8.909 2.1-18.178 2.1-9.27 6.045-16.943 64.834-126.779 182.04-205.928Q336.39-820 480-820t260.815 79.149q117.206 79.149 182.04 205.928 3.945 7.673 6.045 16.588 2.1 8.914 2.1 17.823t-2.1 18.179q-2.1 9.269-6.045 15.256Q858-338 740.805-259 623.61-180 480-180Z">
                                    </path>
                                </svg>
                                <span class="hidden lg:block">{{ __('Request') }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="toremove bg-x-white rounded-x-core shadow-x-core p-4">
            <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-6 gap-4">
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label class="text-x-black font-x-core text-sm">{{ __('Created at') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ $data->created_at->diffForHumans() }}</div>
                </div>
                <div class="flex flex-col gap-px lg:col-span-3">
                    <label class="text-x-black font-x-core text-sm">{{ __('Reference') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ strtoupper($data->reference) }}
                    </div>
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label class="text-x-black font-x-core text-sm">{{ __('Name') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ ucwords($data->name) }}
                    </div>
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label class="text-x-black font-x-core text-sm">{{ __('Email') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ $data->email }}
                    </div>
                </div>
                <div class="flex flex-col gap-px lg:col-span-2">
                    <label class="text-x-black font-x-core text-sm">{{ __('Phone') }}</label>
                    <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                        {{ $data->phone }}
                    </div>
                </div>
                <div class="flex flex-col gap-px lg:col-span-6">
                    <label class="text-x-black font-x-core text-sm">{{ __('Products') }}</label>
                    <table default x-table>
                        <thead>
                            <tr>
                                <td>
                                    <div class="w-max mx-auto">#</div>
                                </td>
                                <td>{{ __('Name') }}</td>
                                <td class="w-[80px] text-center">{{ __('Unit') }}</td>
                                <td class="w-[80px] text-center">{{ __('Quantity') }}</td>
                                <td class="w-[80px] text-center">
                                    {{ ucwords(__('Unit price')) }}<br />({{ $data->currency }})
                                </td>
                                <td class="w-[80px] text-center">
                                    {{ ucwords(__('Lot price')) }}<br />({{ $data->currency }})
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->Items as $item)
                                <tr>
                                    <td>
                                        <div class="w-max mx-auto font-x-core text-sm">{{ $loop->index + 1 }}</div>
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
                                    {{ number_format($data->Total()) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-sm font-x-core text-center">
                                    {{ __('Charges') }} ({{ $data->currency }})
                                </td>
                                <td class="font-x-core text-center">
                                    {{ number_format($data->Charge()) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-sm font-x-core text-center">
                                    {{ ucwords(__('Total amount')) }} ({{ $data->currency }})
                                </td>
                                <td class="font-x-core text-center">
                                    {{ number_format($data->Total() + $data->Charge()) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($data->note)
                    <div class="flex flex-col gap-px lg:col-span-6">
                        <label class="text-x-black font-x-core text-sm">{{ __('Note') }}</label>
                        <div class="w-full bg-x-light text-x-black border-x-shade p-2 text-base border rounded-md">
                            {{ $data->note }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <section id="page" class="w-full container mx-auto">
        <header class="fixed top-0 left-0 right-0 w-full flex flex-wrap gap-4 items-stretch">
            <div class="flex-1 flex flex-col gap-2">
                <img alt="logo-image" src="{{ asset('img/logo.svg') }}?v={{ env('APP_VERSION') }}"
                    class="block w-28 object-contain object-center" />
                <div class="w-[calc(100%-5px)] h-4 bg-x-prime skew-x-[-20deg] ms-[5px] mt-auto"></div>
            </div>
            <div class="w-max flex flex-col gap-2">
                <div class="w-max flex flex-col mx-4">
                    <h1 class="text-x-black">
                        <span class="font-x-core">{{ ucwords(__('Ref No')) }}</span>:
                        {{ strtoupper($data->reference) }}
                    </h1>
                    <h1 class="text-x-black">
                        <span class="font-x-core">{{ __('Date') }}</span>:
                        {{ $data->created_at }}
                    </h1>
                    <h1 class="text-x-black">
                        <span class="font-x-core">{{ ucwords(__('Customer name')) }}</span>:
                        {{ ucwords($data->name) }}
                    </h1>
                </div>
                <div class="flex gap-2 skew-x-[-20deg] mt-auto">
                    <div class="w-[2rem] h-10 bg-x-acent"></div>
                    <div class="flex-1 h-10 bg-x-acent me-[8px]"></div>
                </div>
            </div>
        </header>
        <div class="flex flex-col my-4">
            <h1 class="text-x-black font-x-core text-2xl mb-4 leading-[1] text-center">
                {{ __('Quotation') . ' #' . strtoupper($data->reference) }}
            </h1>
            <div class="border-x-shade border w-full rounded-sm">
                <table class="w-full">
                    <thead>
                        <tr>
                            <td class="text-x-black text-sm font-x-core p-2 ps-4">
                                <div class="w-max mx-auto">#</div>
                            </td>
                            <td class="text-x-black text-sm font-x-core p-2">{{ __('Name') }}</td>
                            <td class="text-x-black text-sm font-x-core p-2 w-[100px] text-center">{{ __('Unit') }}
                            </td>
                            <td class="text-x-black text-sm font-x-core p-2 w-[100px] text-center">{{ __('Quantity') }}
                            </td>
                            <td class="text-x-black text-sm font-x-core p-2 w-[100px] text-center">
                                {{ ucwords(__('Unit price')) }}<br />({{ $data->currency }})
                            </td>
                            <td class="text-x-black text-sm font-x-core p-2 pe-4 w-[100px] text-center">
                                {{ ucwords(__('Lot price')) }}<br />({{ $data->currency }})
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->Items as $item)
                            <tr class="border-x-shade border-t">
                                <td class="text-x-black text-sm font-x-core p-2 ps-4">
                                    <div class="w-max mx-auto font-x-core text-sm">{{ $loop->index + 1 }}</div>
                                </td>
                                <td class="text-x-black text-sm font-x-core p-2 ps-4">{{ $item->Product->details }}
                                </td>
                                <td class="text-x-black text-sm font-x-core p-2 text-center w-[100px]">
                                    {{ $item->unit }}
                                </td>
                                <td class="text-x-black text-sm font-x-core p-2 text-center w-[100px]">
                                    {{ $item->quantity }}
                                </td>
                                <td class="text-x-black text-sm font-x-core p-2 text-center w-[100px]">
                                    {{ number_format($item->price) }}</td>
                                <td class="text-x-black text-sm p-2 text-center w-[100px] font-x-core">
                                    {{ number_format($item->price * $item->quantity) }}</td>
                            </tr>
                        @endforeach
                        <tr class="border-x-shade border-t">
                            <td colspan="5" class="text-x-black text-sm font-x-core p-2 text-center">
                                {{ ucwords(__('Lot price')) }} ({{ $data->currency }})
                            </td>
                            <td class="text-x-black text-sm font-x-core p-2 pe-4 text-center w-[100px]">
                                {{ number_format($data->Total()) }}
                            </td>
                        </tr>
                        <tr class="border-x-shade border-t">
                            <td colspan="5" class="text-x-black text-sm font-x-core p-2 text-center">
                                {{ __('Charges') }} ({{ $data->currency }})
                            </td>
                            <td class="text-x-black text-sm font-x-core p-2 pe-4 text-center w-[100px]">
                                {{ number_format($data->Charge()) }}
                            </td>
                        </tr>
                        <tr class="border-x-shade border-t">
                            <td colspan="5" class="text-x-black text-sm font-x-core p-2 text-center">
                                {{ ucwords(__('Total amount')) }} ({{ $data->currency }})
                            </td>
                            <td class="text-x-black text-sm font-x-core p-2 pe-4 text-center w-[100px]">
                                {{ number_format($data->Total() + $data->Charge()) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @if ($data->note)
                <p class="text-x-black font-x-core mt-4">
                    {{ $data->note }}
                </p>
            @endif
        </div>
        <footer class="fixed bottom-0 left-0 right-0 w-full flex flex-wrap gap-4 items-stretch">
            <div class="flex-1 flex flex-wrap gap-2 skew-x-[-20deg]">
                <div class="flex-1 h-full bg-x-acent ms-[8px]"></div>
                <div class="w-[2rem] h-full bg-x-acent"></div>
            </div>
            <div class="w-8/12 flex flex-col gap-2">
                <div class="w-[calc(100%-5px)] h-4 bg-x-prime skew-x-[-20deg] me-[5px]"></div>
                <div class="flex gap-4 justify-around">
                    <h1 class="text-x-black font-x-core">www.store.com</h1>
                    <h1 class="text-x-black font-x-core">store@test.com</h1>
                    <h1 class="text-x-black font-x-core">+XXX-XXXX-XXXX</h1>
                </div>
            </div>
        </footer>
    </section>
@endsection

@section('scripts')
    <script>
        x.Print.opts.size = {
            head: "150px",
            foot: "70px",
            page: "A4"
        }
        x.DataTable().Print("#page", {
            trigger: "#print",
        });
    </script>
@endsection
