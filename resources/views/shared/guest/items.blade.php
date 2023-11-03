<li>
    <div x-toggle targets="#category_{{ $base->id }}" properties="hidden"
        class="flex items-center justify-between gap-2 text-x-black rounded-md hover:px-3 hover:py-1 focus-within:px-3 focus-within:py-1 hover:bg-x-black-blur focus-within:bg-x-black-blur">
        <a class="text-lg font-x-core outline-none {{ $base->Categories->count() ? 'w-max' : 'w-full' }}"
            href="{{ route('views.guest.products', [
                'category' => $base->slug,
            ]) }}">{{ ucwords($base->name) }}</a>
        @if ($base->Categories->count())
            <span
                class="bg-x-black w-3 h-3 rounded-full block relative before:absolute before:content-[''] before:w-4 before:h-1 before:bg-x-black before:right-0 before:top-1/2 before:-translate-y-1/2 before:rounded-full rtl:before:left-0 rtl:before:right-auto"></span>
        @endif
    </div>
    @if ($base->Categories->count())
        <ul id="category_{{ $base->id }}" class="x-category hidden relative px-2">
            @foreach ($base->Categories as $category)
                @include('shared.guest.items', [
                    'base' => $category,
                ])
            @endforeach
        </ul>
    @endif
</li>
