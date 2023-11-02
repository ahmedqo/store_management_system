<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Core::lang('ar') ? 'rtl' : 'ltr' }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}?v={{ env('APP_VERSION') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ env('APP_VERSION') }}" />
    <title>{{ __('Quotation Summary') . ' #' . $data->reference }}</title>
</head>

<body>
    <main id="page" class="hidden w-full container mx-auto">
        <header class="fixed top-0 left-0 right-0 w-full flex flex-wrap gap-4 items-end">
            <div class="flex-1 flex flex-col gap-2">
                <img alt="logo-image" src="{{ asset('img/logo.svg') }}?v={{ env('APP_VERSION') }}"
                    class="block w-28 flex-1 object-contain object-center" />
                <div class="w-[calc(100%-5px)] h-4 bg-x-prime skew-x-[-20deg] ms-[5px]"></div>
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
                <div class="flex gap-2 skew-x-[-20deg]">
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
    </main>
    <script src="{{ asset('js/x.elements.js') }}?v={{ env('APP_VERSION') }}"></script>
    @if (Session::has('message'))
        <script>
            const data = {!! json_encode(Session::all()) !!};
            x.Toaster(data.message, data.type);
            if (data.clean) {
                localStorage.removeItem("{{ env('APP_CART') }}");
            }
        </script>
    @endif
    <script>
        x.Print.opts = {
            ...x.Print.opts,
            css: [
                "<link rel='stylesheet' href='{{ asset('css/index.css') }}?v={{ env('APP_VERSION') }}' />",
                "<link rel='stylesheet' href='{{ asset('css/app.css') }}?v={{ env('APP_VERSION') }}' />"
            ],
            dir: "{{ Core::lang('ar') ? 'rtl' : 'ltr' }}",
            lang: "{{ app()->getLocale() }}",
            margin: "10mm 10mm 10mm 10mm",
            size: {
                head: "150px",
                foot: "70px",
                page: "A4"
            }
        }
        document.addEventListener("DOMContentLoaded", () => {
            x.Print("#page", {
                exec: true
            });
        });
    </script>
</body>

</html>
