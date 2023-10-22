@extends('shared.admin.base')
@section('title', __('Update Product') . ' #' . $data->id)

@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex items-center justify-between gap-2">
            <h1 class="font-x-core text-2xl">{{ __('Update Product') }} #{{ $data->id }}</h1>
            <div
                class="lg:w-max fixed bottom-0 left-0 right-0 lg:relative lg:bottom-auto lg:left-auto lg:right-auto z-[5] lg:z-0 pointer-events-none">
                <div class="container mx-auto lg:w-max p-4 lg:p-0">
                    <div
                        class="w-max flex gap-[2px] flex-col lg:flex-row ms-auto pointer-events-auto rounded-x-core overflow-hidden">
                        <form action="{{ route('actions.products.clear', $data->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="flex gap-2 items-center justify-center font-x-core text-sm rounded-sm bg-red-400 text-x-white relative p-2 lg:px-4 h-[42px] aspect-square lg:aspect-auto outline-none hover:!text-x-black hover:bg-red-300 focus-within:!text-x-black focus-within:bg-red-300">
                                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                                </svg>
                                <span class="hidden lg:block">{{ __('Delete') }}</span>
                            </button>
                        </form>
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
            <form id="form" action="{{ route('actions.products.patch', $data->id) }}" method="POST"
                enctype="multipart/form-data" class="w-full flex flex-col gap-4">
                @csrf
                @method('patch')
                <div class="flex flex-col gap-px">
                    <label for="name" class="text-x-black font-x-core text-sm">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" placeholder="{{ __('Name') }}"
                        value="{{ $data->name }}"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                </div>
                <div class="w-full flex flex-col lg:flex-row gap-4">
                    <div class="flex flex-col gap-px lg:flex-[1]">
                        <label for="reference" class="text-x-black font-x-core text-sm">{{ __('Reference') }}</label>
                        <input id="reference" type="text" name="reference" placeholder="{{ __('Reference') }}"
                            value="{{ $data->reference }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                    <div class="flex flex-col gap-px lg:flex-[1]">
                        <label for="price" class="text-x-black font-x-core text-sm">{{ __('Price') }}</label>
                        <input id="price" type="number" name="price" placeholder="{{ __('Price') }}"
                            value="{{ $data->price }}"
                            class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                    </div>
                </div>
                <div class="flex flex-col gap-px">
                    <label for="details" class="text-x-black font-x-core text-sm">{{ __('Details') }}</label>
                    <textarea id="details" name="details" placeholder="{{ __('Details') }}" rows="3"
                        class="bg-x-light text-x-black border-x-shade focus-within:outline-x-prime p-2 text-base border rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2">{{ $data->details }}</textarea>
                </div>
                <div class="w-full flex flex-col gap-px">
                    <label for="images" class="text-x-black font-x-core text-sm">{{ __('Images') }}</label>
                    <input x-uploader id="images" type="file" name="images[]" target=".image_display" multiple />
                    @foreach ($data->Files->reverse() as $file)
                        <button data-id="{{ $file->id }}"
                            class="hidden image_display w-full group aspect-square bg-x-shade bg-opacity-50 rounded-md items-center justify-center cursor-pointer overflow-hidden relative">
                            <img src="{{ Core::files(Core::PRODUCT)->get($file->name) }}"
                                class="w-full h-full object-contain pointer-events-none transition-transform group-hover:scale-150" />
                            <div
                                class="bg-x-black text-x-white opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity w-full h-full absolute inset-0 bg-opacity-50 flex items-center justify-center">
                                <svg fill="currentcolor" viewBox="0 96 960 960" class="block w-16 h-16 pointer-events-none">
                                    <path
                                        d="m480 647 88 88q10.733 12 28.367 12 17.633 0 30.459-11.826Q638 724 638 706.25T627 677l-88-89 88-90q11-11.733 11-29.367 0-17.633-11.174-28.459Q615 429 597.367 428.5 579.733 428 569 440l-89 89-87-89q-10.5-12-28.75-11.5t-30.424 11.674Q322 452 322 469.133q0 17.134 12 28.867l88 90-88 88q-11 12.5-11 29.75t10.826 29.424Q346 747 363.75 747T393 735l87-88ZM253 957q-35.725 0-63.863-27.138Q161 902.725 161 866V314h-11q-19 0-31.5-12.5T106 268q0-19 12.5-32t31.5-13h182q0-20 13-33.5t33-13.5h204q20 0 33.5 13.3T629 223h180q20 0 33 13t13 32q0 21-13 33.5T809 314h-11v552q0 36.725-27.638 63.862Q742.725 957 706 957H253Z">
                                    </path>
                                </svg>
                            </div>
                        </button>
                    @endforeach
                </div>
                <div class="w-full flex flex-col lg:flex-row gap-4">
                    <div class="flex flex-col gap-px lg:flex-[1]">
                        <label for="category" class="text-x-black font-x-core text-sm">{{ __('Category') }}</label>
                        <select x-select {{ $categories->count() > 6 ? 'search' : '' }} id="category" name="category"
                            placeholder="{{ __('Category') }}">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $data->category ? 'selected' : '' }}>
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
                                <option value="{{ $brand->id }}" {{ $brand->id == $data->brand ? 'selected' : '' }}>
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
                                        <option value="{{ $unit }}" {{ $unit == $data->unit ? 'selected' : '' }}>
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
                                <option value="{{ $state }}" {{ $state == $data->status ? 'selected' : '' }}>
                                    {{ ucwords(__($state)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-px">
                    <label for="description" class="text-x-black font-x-core text-sm">{{ __('Description') }}</label>
                    <div class="border-x-shade border rounded-md overflow-hidden">
                        <textarea id="description" name="description" placeholder="{{ __('Description') }}" rows="3">{{ $data->description }}</textarea>
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

        const files = document.querySelectorAll(".image_display"),
            save = document.querySelector("#save"),
            form = document.querySelector("#form");

        document.addEventListener("DOMContentLoaded", () => {
            files.forEach(file => {
                file.classList.remove("hidden");
                file.classList.add("flex");
                file.addEventListener("click", e => {
                    const id = file.dataset.id;
                    file.remove();

                    form.insertAdjacentHTML("beforeend",
                        '<input type="hidden" name="delete[]" value="' + id + '" />');
                });
            });
        });


        save.addEventListener("click", e => {
            form.submit();
        });
    </script>
@endsection
