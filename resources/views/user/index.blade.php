@extends('shared.admin.base')
@section('title', __('Users List'))

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Users List') }}</h1>
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
                        <a href="{{ route('views.users.store') }}"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-blue-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-blue-300 focus-within:!text-x-black focus-within:bg-blue-300">
                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                            </svg>
                            <span class="hidden lg:block">{{ __('New') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full">
            <table x-table search filter remove="9" download="users_list">
                <thead>
                    <tr>
                        <td>
                            <div class="w-max mx-auto">#</div>
                        </td>
                        <td>{{ __('Full Name') }}</td>
                        <td>{{ __('Gender') }}</td>
                        <td class="hidden">
                            {{ __('Birth Date') }}
                        </td>
                        <td class="hidden">
                            {{ __('Nationality') }}
                        </td>
                        <td class="hidden">
                            {{ __('Identity') }}
                        </td>
                        <td>{{ __('Phone') }}</td>
                        <td>{{ __('Email') }}</td>
                        <td class="hidden">
                            {{ __('Address') }}
                        </td>
                        <td>
                            <div class="w-max mx-auto">{{ __('Actions') }}</div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>
                                <div class="w-max mx-auto font-x-core text-sm">{{ $row->id }}</div>
                            </td>
                            <td>{{ strtoupper($row->last_name) }} {{ ucfirst($row->first_name) }}</td>
                            <td>{{ ucwords(__($row->gender) ?? '___') }}</td>
                            <td class="hidden">{{ $row->birth_date ?? '___' }}</td>
                            <td class="hidden">{{ $row->nationality ?? '___' }}</td>
                            <td class="hidden">{{ $row->identity ?? '___' }}</td>
                            <td>{{ $row->phone ?? '___' }}</td>
                            <td>{{ $row->email ?? '___' }}</td>
                            <td class="hidden">
                                {{ $row->address ?? '___' }}
                            </td>
                            <td>
                                @include('shared.admin.action', [
                                    'patch' => route('views.users.patch', $row->id),
                                    'clear' => route('actions.users.clear', $row->id),
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <section id="page" class="w-full hidden">
        <div class="flex flex-col">
            <h1 class="text-x-black font-x-core text-2xl p-4">{{ __('Users List') }}</h1>
            <div class="flex flex-col gap-4">
                @foreach ($data as $row)
                    @if ($loop->index > 0)
                        <div class="border-x-shade border-t"></div>
                    @endif
                    <div class="w-full grid grid-rows-1 grid-cols-6 gap-4 px-4">
                        <div class="flex flex-col gap-px">
                            <label class="text-x-black font-x-core text-sm">#</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-white border border-x-shade">
                                {{ $row->id }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px col-span-5">
                            <label class="text-x-black font-x-core text-sm">{{ __('Full Name') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-white border border-x-shade">
                                {{ strtoupper($row->last_name) }} {{ ucfirst($row->first_name) }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px col-span-3">
                            <label class="text-x-black font-x-core text-sm">{{ __('Gender') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-white border border-x-shade">
                                {{ ucwords(__($row->gender) ?? '___') }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px col-span-3">
                            <label class="text-x-black font-x-core text-sm">{{ __('Birth Date') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-white border border-x-shade">
                                {{ $row->birth_date ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px col-span-3">
                            <label class="text-x-black font-x-core text-sm">{{ __('Nationality') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-white border border-x-shade">
                                {{ $row->nationality ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px col-span-3">
                            <label class="text-x-black font-x-core text-sm">{{ __('Identity') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-white border border-x-shade">
                                {{ $row->identity ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px col-span-3">
                            <label class="text-x-black font-x-core text-sm">{{ __('Email') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-white border border-x-shade">
                                {{ $row->email ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px col-span-3">
                            <label class="text-x-black font-x-core text-sm">{{ __('Phone') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-white border border-x-shade">
                                {{ $row->phone ?? '___' }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-px col-span-6">
                            <label class="text-x-black font-x-core text-sm">{{ __('Address') }}</label>
                            <div
                                class="min-h-[42px] text-x-black text-base w-full p-2 rounded-md bg-x-white border border-x-shade">
                                {{ $row->address ?? '___' }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        x.DataTable().Print("#page", "#print");
    </script>
@endsection
