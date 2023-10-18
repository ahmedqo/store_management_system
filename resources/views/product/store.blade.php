@extends('shared.admin.base')
@section('title', __('Create Product'))

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Create Product') }}</h1>
            <div
                class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                <div class="container mx-auto lg:w-max p-4 lg:p-0">
                    <div
                        class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                        <button id="save"
                            class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-purple-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-purple-300 focus-within:!text-x-black focus-within:bg-purple-300">
                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M190-99q-37.125 0-64.062-26.938Q99-152.875 99-190v-580q0-37.125 26.938-64.562Q152.875-862 190-862h464q18.816 0 36.024 7.543Q707.232-846.913 719-834l115 115q12.913 11.768 20.457 28.976Q862-672.816 862-654v464q0 37.125-27.438 64.062Q807.125-99 770-99H190Zm289.647-157Q522-256 552-285.647q30-29.647 30-72T552.353-430q-29.647-30-72-30T408-430.353q-30 29.647-30 72T407.647-286q29.647 30 72 30ZM290-577h263q18.375 0 31.688-12.625Q598-602.25 598-623v-48q0-19.775-13.312-32.388Q571.375-716 553-716H290q-20.75 0-33.375 12.612Q244-690.775 244-671v48q0 20.75 12.625 33.375T290-577Z" />
                            </svg>
                            <span class="hidden lg:block">{{ __('Save') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="toremove bg-x-white rounded-x-core shadow-x-core p-4">
            <form id="form" action="{{ route('actions.products.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full flex flex-col gap-4">
                @csrf
                <div class="flex flex-col gap-px">
                    <label for="name" class="text-x-black font-x-core text-sm">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" placeholder="{{ __('Name') }}"
                        value="{{ old('name') }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="w-full flex flex-col lg:flex-row gap-4">
                    <div class="flex flex-col gap-px lg:flex-[1]">
                        <label for="reference" class="text-x-black font-x-core text-sm">{{ __('Reference') }}</label>
                        <input id="reference" type="text" name="reference" placeholder="{{ __('Reference') }}"
                            value="{{ old('reference') }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <div class="flex flex-col gap-px lg:flex-[1]">
                        <label for="price" class="text-x-black font-x-core text-sm">{{ __('Price') }}</label>
                        <input id="price" type="number" name="price" placeholder="{{ __('Price') }}"
                            value="{{ old('price') }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                </div>
                <div class="flex flex-col gap-px">
                    <label for="details" class="text-x-black font-x-core text-sm">{{ __('Details') }}</label>
                    <textarea id="details" name="details" placeholder="{{ __('Details') }}" rows="3"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2">{{ old('details') }}</textarea>
                </div>
                <div class="w-full flex flex-col gap-px">
                    <label for="images" class="text-x-black font-x-core text-sm">{{ __('Images') }}</label>
                    <input x-uploader id="images" type="file" name="images[]" multiple />
                </div>
                <div class="w-full flex flex-col lg:flex-row gap-4">
                    <div class="flex flex-col gap-px lg:flex-[1]">
                        <label for="category" class="text-x-black font-x-core text-sm">{{ __('Category') }}</label>
                        <select x-select {{ $categories->count() > 6 ? 'search' : '' }} id="category" name="category"
                            placeholder="{{ __('Category') }}">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category') ? 'selected' : '' }}>
                                    {{ ucwords($category->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-px lg:flex-[1]">
                        <label for="brand" class="text-x-black font-x-core text-sm">{{ __('Brand') }}</label>
                        <select x-select {{ $brands->count() > 6 ? 'search' : '' }} id="brand" name="brand"
                            placeholder="{{ __('Brand') }}">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == old('brand') ? 'selected' : '' }}>
                                    {{ ucwords($brand->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-full flex flex-col lg:flex-row gap-4">
                    <div class="flex flex-col gap-px lg:flex-[1]">
                        <label for="unit" class="text-x-black font-x-core text-sm">{{ __('Unit') }}</label>
                        <select x-select search id="unit" name="unit" placeholder="{{ __('Unit') }}">
                            @foreach (Core::units() as $label => $group)
                                <optgroup label="{{ ucwords(__($label)) }}">
                                    @foreach ($group as $unit)
                                        <option value="{{ $unit }}" {{ $unit == old('unit') ? 'selected' : '' }}>
                                            {{ ucwords(__($unit)) }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-px lg:flex-[1]">
                        <label for="status" class="text-x-black font-x-core text-sm">{{ __('Status') }}</label>
                        <select x-select id="status" name="status" placeholder="{{ __('Status') }}">
                            @foreach (Core::states() as $state)
                                <option value="{{ $state }}" {{ $state == old('status') ? 'selected' : '' }}>
                                    {{ ucwords(__($state)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-px">
                    <label for="description" class="text-x-black font-x-core text-sm">{{ __('Description') }}</label>
                    <div class="border-x-shade border rounded-md overflow-hidden">
                        <textarea id="description" name="description" placeholder="{{ __('Description') }}" rows="3">{{ old('description') }}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/5q3f1hswxbi1wr1hsf6r4che0wgz79s909nh2cl0vwv81983/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        x.Uploader().Select();
        tinymce.init({
            selector: "#description",
            language: "{{ app()->getLocale() }}",
            plugins: "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount advlist  preview code fullscreen insertdatetime", // print paste",
            toolbar: "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat",
        });

        const save = document.querySelector("#save"),
            form = document.querySelector("#form");
        save.addEventListener("click", e => {
            form.submit();
        });
    </script>
@endsection
